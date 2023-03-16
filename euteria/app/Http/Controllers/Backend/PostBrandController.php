<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostBrandRequest;
use App\Models\Backend\PostBrand;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PostBrandController extends Controller
{
    use Response;
    use Upload;
    
    public function source()
    {
        $query = PostBrand::query();        
        return DataTables::eloquent($query)        
        ->editColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('image', function ($data) {
            $image = '<img src="'.asset($data->image).'" width="50px"/>';
            return $data->image ? $image:'-';
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.post-brand.index-action')
        ->rawColumns(['action','image'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.post-brand.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.post-brand.form',compact(['data']));
    }

    public function store(PostBrandRequest $request)
    {
        DB::beginTransaction();
        try {

            /* JIKA IMAGE */
            if($request->has('file')){                
                $image = $this->upload($request->file,'image/post-brand',Str::slug($request->name).'_'.strtotime('now'));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  

            PostBrand::create($request->all());
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success-message','PostBrand berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = PostBrand::findOrFail($id);
        return view('backend.post-brand.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = PostBrand::findOrFail($id);
        return view('backend.post-brand.form',compact(['data']));
    }

    public function update(PostBrandRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = PostBrand::findOrFail($id);
            $data->slug = null;

            /* JIKA IMAGE */
            if($request->has('file')){     
                if(File::exists($data->image))
                {
                    File::delete($data->image);
                }
                $image = $this->upload($request->file,'image/post-brand',Str::slug($request->name).'_'.strtotime('now'));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  
            
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.brand.index')->with('success-message','PostBrand berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = PostBrand::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
