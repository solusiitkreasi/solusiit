<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\Models\Backend\PostCategory;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PostCategoryController extends Controller
{
    use Response;
    use Upload;
    
    public function source()
    {
        $query = PostCategory::query();        
        return DataTables::eloquent($query)        
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->whereTranslationLike('name', '%'.request('search')['value'].'%');
            }
        })
        ->addColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('image', function ($data) {
            $image = '<img src="'.asset($data->image).'" width="50px"/>';
            return $data->image ? $image:'-';
        })
        ->editColumn('parent', function ($data) {
            return $data->parent ? $data->parent->name:'-';
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.post-category.index-action')
        ->rawColumns(['action','image'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.post-category.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.post-category.form',compact(['data']));
    }

    public function store(PostCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            
            /* JIKA IMAGE */
            if($request->has('file')){                
                $image = $this->upload($request->file,'image/post-category',strtotime('now'));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  

            PostCategory::create($request->all());
            DB::commit();
            return redirect()->route('admin.category.index')->with('success-message','PostCategory berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function show($id)
    {        
        $data = PostCategory::findOrFail($id);
        return view('backend.post-category.show',compact(['data']));
    }

    public function edit($id)
    {
        $data = PostCategory::findOrFail($id);
        return view('backend.post-category.form',compact(['data']));
    }

    public function update(PostCategoryRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = PostCategory::findOrFail($id);
            $data->slug = null;

            /* JIKA IMAGE */
            if($request->has('file')){                
                $image = $this->upload($request->file,'image/post-category',strtotime('now'));
                // $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key));                    
                $value = $image['file_name'];
                $request->merge(['image'=>$value]);
            }  
            
            $data->update($request->all());
            DB::commit();
            return redirect()->route('admin.category.index')->with('success-message','PostCategory berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = PostCategory::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    public function getCategory(Request $request)
    {
        $category = PostCategory::query();
        $data = [];
        if($request->has('id'))
        {
            // $data = $data->select('ms_provinsi_id','nama_provinsi')->get();
            $category = $category->where('parent_id',$request->id)->get();
            $data = $category;
        }else{
            $category = $category->whereNull('parent_id')->get();
            $data = $category;
        }
        
        return $this->success(['data'=>$data]);   
    }
}
