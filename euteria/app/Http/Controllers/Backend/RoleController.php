<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    use Response;

    public function source()
    {
        $query = Role::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('display_name', function ($data) {
            return $data->display_name;
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.role.index-action')
        ->rawColumns(['action'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.role.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.role.form',compact(['data']));
    }

    public function store(RoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'name'=>Str::slug($request->display_name)
            ]);
            $role = Role::create($request->all());

        
            if($request->has('permission'))
            {
                $role->attachPermissions($request->permission);
            }

            DB::commit();
            return redirect()->route('admin.role.index')->with('success-message','Role berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = Role::findOrFail($id);
        return view('backend.role.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('backend.role.form',compact(['data']));
    }

    public function update(RoleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Role::findOrFail($id);
            $request->merge([
                'name'=>Str::slug($request->display_name)
            ]);
            $data->detachPermissions(Permission::get());

            $data->update($request->all());
            $data->attachPermissions($request->permission);
            DB::commit();
            return redirect()->route('admin.role.index')->with('success-message','Role berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Role::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    public function permission($role)
    {
        $data = Role::find($role);

        if($data)
        {
            return $this->success($data->permissions);
        }

        return $this->not_found();
    }
}
