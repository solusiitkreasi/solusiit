<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Utility\Feedback;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends Controller
{
    use Response;

    public function source(Request $request)
    {
        $query = Feedback::query();        

        return DataTables::eloquent($query)
        ->editColumn('name',function ($data){
            return $data->name;
        })
        ->editColumn('email',function ($data){
            return $data->email;
        })
        ->editColumn('company',function ($data){
            return $data->company;
        })
        ->editColumn('rate',function ($data){
            return Feedback::rate($data->rate);
        })
        ->editColumn('status',function ($data){
            
            return Feedback::status($data->status);
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.feedback.index-action')
        ->rawColumns(['action','rate','status'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.feedback.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.feedback.form',compact(['data']));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Feedback::create($request->all());
            DB::commit();
            return redirect()->route('admin.feedback.index')->with('success-message','Feedback berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = Feedback::findOrFail($id);
        $data->update(['status'=>1]);
        return view('backend.feedback.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Feedback::findOrFail($id);
        return view('backend.feedback.form',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Feedback::findOrFail($id);
            $data->slug = null;
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.feedback.index')->with('success-message','Feedback berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Feedback::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
