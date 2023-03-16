<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DPRD\Tamu;
use App\Models\Utility\Provinsi;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TamuController extends Controller
{
    use Response;

    public function source(Request $request)
    {
        $query = Tamu::query();        

        return DataTables::eloquent($query)
        ->filterColumn('provinsi',function($q,$key){
            $q->whereHas('provinsi',function($q) use ($key){
                $q->where('nama_provinsi','like','%'.$key.'%');
            });
        })        
        ->filterColumn('kota',function($q,$key){
            $q->whereHas('kota',function($q) use ($key){
                $q->where('nama_kota','like','%'.$key.'%');
            });
        })        
        ->editColumn('post_date',function ($data){
            return $data->created_at ? $data->created_at->format('d-m-Y'):'-';
        })
        ->editColumn('provinsi',function ($data){
            return $data->provinsi ? $data->provinsi->nama_provinsi:'-';
        })
        ->editColumn('kota',function ($data){
            return $data->kota ? $data->kota->nama_kota:'-';
        })
        ->editColumn('status_tampil',function ($data){
            $status = ['danger','success'];
            return '<span class="badge badge-'.$status[$data->status_tampil].' d-block">&nbsp;</span>';
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.tamu.index-action')
        ->rawColumns(['action','status_tampil'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.tamu.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.tamu.form',compact(['data']));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Tamu::create($request->all());
            DB::commit();
            return redirect()->route('admin.tamu.index')->with('success-message','Tamu berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = Tamu::findOrFail($id);
        return view('backend.tamu.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Tamu::findOrFail($id);
        return view('backend.tamu.form',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Tamu::findOrFail($id);
            $data->slug = null;
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.tamu.index')->with('success-message','Tamu berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Tamu::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
