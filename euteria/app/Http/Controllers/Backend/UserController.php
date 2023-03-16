<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use Response;

    public function source()
    {
        $query = User::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('username', function ($data) {
            return $data->username;
        })
        ->editColumn('email', function ($data) {
            return $data->email;
        })
        ->editColumn('role', function ($data) {

            // return $data->getRoles()[0];
            return $data->getRoles();
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.user.index-action')
        ->rawColumns(['action'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.user.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.user.form',compact(['data']));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->merge(['password'=>Hash::make($request->password)]);
            
            $user = User::create($request->all());

            $user->attachRole($request->role);
            $user->attachPermissions($request->permission);
            DB::commit();
            return redirect()->route('admin.user.index')->with('success-message','User berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('backend.user.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        
        return view('backend.user.form',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            

            $request->merge(['password'=>Hash::make($request->password)]);
            $data = User::findOrFail($id); 

            $data->detachRoles(Role::get());
            $data->detachPermissions(Permission::get());

            $data->update($request->all());
            $data->attachRole($request->role);           
            $data->attachPermissions($request->permission);           
            DB::commit();
            return redirect()->route('admin.user.index')->with('success-message','User berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    /* EXTENDS */
    public function profile()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('backend.user.profile',compact(['data']));
    }

    public function profileUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = User::findOrFail(Auth::user()->id);
            $data->update($request->all());
            DB::commit();
            return redirect()->back()->with('success-message','Profile Berhasil Dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function changePassword(Request $request)
    {        
        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->new_password == $request->new_password_confirmation)            
            {
                $user = Auth::user();
                $user->password = Hash::make($request->new_password);
                $user->save();
                return $this->success();
            }
            return $this->error(['message' =>'Konfirmasi Password Baru Anda Salah'],400);
        }else{
            return $this->error(['message' =>'Password Lama Anda Salah'],400);
        }
    }


}
