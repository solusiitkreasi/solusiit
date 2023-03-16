<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    use Response;
    use Upload;

    public function source()
    {
        $query = Service::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('images', function ($data) {
            return "<img src='".asset($data->images)."' width='50px'>";
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.service.index-action')
        ->rawColumns(['action','images'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.service.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.service.form',compact(['data']));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->has('image')){                
                $image = [];
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image[] = $this->upload($row, 'image/slider', Str::slug($request->name['en']).'-'.$key);                        
                    }
                }
                $request->merge(['images'=>$image[0]['file_name']]);
            }  
            $request->merge(['name'=>$request->name['en'],'locale'=>json_encode(['name'=>$request->name])]);
            Service::create($request->all());
            DB::commit();
            return redirect()->route('admin.service.index')->with('success-message','Service berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->with('error-message',$e->getMessage());
            return $e->getMessage();
        }
    }

    public function show($id)
    {        
        $data = Service::findOrFail($id);
        return view('backend.service.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = Service::findOrFail($id);
        return view('backend.service.form',compact(['data']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if($request->has('image')){                
                $image = [];
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image[] = $this->upload($row, 'image/slider', Str::slug($request->name['en']).'-'.$key);                        
                    }
                }
                $request->merge(['images'=>$image[0]['file_name']]);
            }  
            $request->merge(['name'=>$request->name['en'],'locale'=>json_encode(['name'=>$request->name])]);
            $data = Service::findOrFail($id);            
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.service.index')->with('success-message','Service berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());

        }
    }

    public function destroy($id)
    {
        $data = Service::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
