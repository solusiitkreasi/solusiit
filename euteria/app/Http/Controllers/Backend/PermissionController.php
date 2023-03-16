<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Auth\Permission;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    use Response;

    public function source()
    {
        $query = Permission::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('display_name', function ($data) {
            return $data->display_name;
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.permission.index-action')
        ->rawColumns(['action'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.permission.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.permission.form',compact(['data']));
    }

    public function store(PermissionRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'name'=>Str::slug($request->display_name)
            ]);
            Permission::create($request->all());
            DB::commit();
            return redirect()->route('admin.permission.index')->with('success-message','Permission berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {
        $data = Permission::findOrFail($id);
        return view('backend.permission.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Permission::findOrFail($id);
        return view('backend.permission.form',compact(['data']));
    }

    public function update(PermissionRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Permission::findOrFail($id);
            $request->merge([
                'name'=>Str::slug($request->display_name)
            ]);
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.permission.index')->with('success-message','Permission berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Permission::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
