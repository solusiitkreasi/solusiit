<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyRequest;
use App\Models\Utility\Testimony;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TestimonyController extends Controller
{
    use Response;
    use Upload;
    
    public function source()
    {
        $query = Testimony::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('image', function ($data) {
            $image = '<img src="'.asset($data->image).'" width="50px"/>';
            return $data->image ? $image:'-';
        })
        ->editColumn('status', function ($data) {
            $style = [
                ['text'=>'Inactive','color'=>'danger'],
                ['text'=>'Active','color'=>'success'],
            ];
            return '<span class="badge badge-'.$style[$data->status]['color'].'">'.$style[$data->status]['text'].'</span>';
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.testimony.index-action')
        ->rawColumns(['action','image','status'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.testimony.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.testimony.form',compact(['data']));
    }

    public function store(TestimonyRequest $request)
    {
        DB::beginTransaction();
        try {

            /* JIKA IMAGE */
            if($request->has('file')){                
                $image = $this->upload($request->file,'image/testimony',Str::slug($request->name));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  

            Testimony::create($request->all());
            DB::commit();
            return redirect()->route('admin.testimony.index')->with('success-message','Testimony berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = Testimony::findOrFail($id);
        return view('backend.testimony.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Testimony::findOrFail($id);
        return view('backend.testimony.form',compact(['data']));
    }

    public function update(TestimonyRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Testimony::findOrFail($id);
            $data->slug = null;

            /* JIKA IMAGE */
            if($request->has('file')){                
                $image = $this->upload($request->file,'image/testimony',Str::slug($request->name));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  
            
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.testimony.index')->with('success-message','Testimony berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Testimony::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
