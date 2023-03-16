<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\Post;
use App\Models\Backend\PostFile;
use App\Models\Backend\PostImage;
use App\Models\Backend\PostTranslation;
use App\Traits\Response;
use App\Traits\Upload;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use Response;
    use Upload;
    use UploadFile;

    public function source($slug)
    {
        
        $menu = Menu::findBySlug($slug);
        $query = Post::query();
        $query->with(['menu']);
        $query->where('menu_id',$menu->id);
        return DataTables::eloquent($query)
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->whereTranslationLike('name', '%'.request('search')['value'].'%');
            }
        },true)
        ->addColumn('name', function ($data) {
            return $data->name;
        })
        ->editColumn('image', function ($data) {
            return '<img src="'.asset($data->first_images).'" class="img-fluid" width="50px"/>';
        })
        ->editColumn('file', function ($data) {
            return '<a target="_blank" href="'.asset($data->first_file).'">'.$data->name.'</a>';
        })
        ->editColumn('post_date', function ($data) {
            return $data->post_date ? $data->post_date->format('d-m-Y'):'';
        })
        ->editColumn('coordinate', function ($data) {
            return $data->coordinate;
        })
        ->editColumn('email', function ($data) {
            return $data->email;
        })
        ->editColumn('phone_number', function ($data) {
            return $data->phone_number;
        })
        ->editColumn('description', function ($data) {
            return Str::limit(strip_tags($data->description));
        })
        ->addIndexColumn()
        ->addColumn('action', function($data) use ($menu){
            return view('backend.post.'.$menu->type.'.index-action',compact(['data','menu']));
        })
        ->rawColumns(['action','image','file'])
        ->toJson();
    }

    public function index($slug)
    {        
        $menu = Menu::findBySlug($slug);
        $data = '';
        if(!$menu)
        {
            return redirect()->route('admin.dashboard');
        }

        if($menu->type == Menu::TYPE_PAGE || $menu->type == Menu::TYPE_HYPERLINK )
        {
            $data = Post::where('menu_id',$menu->id)->first();
        }        
        return view('backend.post.'.$menu->type.'.index',compact(['menu','data']));
    }

    public function create($slug)
    {
        $data = null;
        $menu = Menu::findBySlug($slug);
        return view('backend.post.'.$menu->type.'.form',compact(['data','menu']));
    }
    
    public function store(Request $request, $slug)
    {
        // return $request->all();
        
        DB::beginTransaction();
        try {            
            $menu = Menu::findBySlug($slug);
            $request->merge(['menu_id'=>$menu->id]);

            if(isset($request->marketplace))
            {
                $marketplace_link = [];
                if(count($request->marketplace))
                {
                    foreach($request->marketplace as $row)
                    {
    
                        if($row['name'] || $row['link'])
                        {
                            $marketplace_link [] = $row;
                        }
                    }
                }
                $request->merge(['marketplace_link'=>json_encode($marketplace_link)]);

            }

            if($request->has('file_brochure'))
            {
                $brochure = $this->upload($request->file_brochure,'product/brochure/',strtotime('now'));
                $request->merge(['brochure'=>$brochure['file_name']]);
            }

            if($request->has('file_certificate'))
            {
                $certificate = $this->upload($request->file_certificate,'product/certificate/',strtotime('now'));
                $request->merge(['certificate'=>$certificate['file_name']]);
            }

            $post = Post::create($request->all());            

            

            if($request->has('image')){                
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image = $this->upload($row, 'image/'.$menu->type, strtotime('now').'-'.$key);
                        $image['post_id']=$post->id;
                        PostImage::create($image);
                    }
                }
            }   

            if($request->has('file')){                
                foreach($request->file as $key=>$row){
                    if($row)
                    {
                        $file = $this->uploadFile($row, 'file/'.$menu->type, strtotime('now').'-'.$key);
                        $file['post_id']=$post->id;
                        PostFile::create($file);
                    }
                }
            }
            
            DB::commit();
            return redirect()->route('admin.post.index',$menu->slug)->with('success-message', ucwords($menu->name).' berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->with('error-message', $e->getMessage());
            return $e->getMessage();
        }
    }

    public function show($slug, $id)
    {
        $menu = Menu::findBySlug($slug);
        $data = Post::where('id',$id)->where('menu_id',$menu->id)->first();
        if(!$data) abort(404);
        return view('backend.post.'.$menu->type.'.show',compact(['data','menu']));
    }

    public function edit($slug, $id)
    {
        $menu = Menu::findBySlug($slug);
        // $data = Post::with(['post_translation'])->where('id',$id)->where('menu_id',$menu->id)->first();
        $data = Post::where('id',$id)->where('menu_id',$menu->id)->first();
        // return $data;
        if(!$data) abort(404);
        return view('backend.post.'.$menu->type.'.form',compact(['data','menu']));
    }

    public function update(Request $request, $slug, $id)
    {
        DB::beginTransaction();
        try {
            $menu = Menu::findBySlug($slug);
            $data = Post::findOrFail($id);            
            
            $data->slug = null;
            if($request->has('image')){   
                if(in_array($menu->type,[Menu::TYPE_ARTICLE,Menu::TYPE_PRODUCT,Menu::TYPE_RESELLER]))
                {
                    PostImage::where('post_id',$data->id)->delete();
                }
                foreach($request->image as $key=>$row){
                    if($row)
                    {
                        $image = $this->upload($row, 'image/'.$menu->type, strtotime('now').'-'.$key);
                        $image['post_id']=$data->id;
                        PostImage::create($image);
                    }
                }
            }   

            if($request->has('file')){                
                PostFile::where('post_id',$data->id)->delete();
                foreach($request->file as $key=>$row){
                    if($row)
                    {
                        $file = $this->upload($row, 'file/'.$menu->type, strtotime('now').'-'.$key);
                        $file['post_id']=$data->id;
                        PostFile::create($file);
                    }
                }
            }

            

            if($request->has('file_brochure'))
            {
                $brochure = $this->upload($request->file_brochure,'product/brochure/',strtotime('now'));
                $request->merge(['brochure'=>$brochure['file_name']]);
            }

            if($request->has('file_certificate'))
            {
                $certificate = $this->upload($request->file_certificate,'product/certificate/',strtotime('now'));
                $request->merge(['certificate'=>$certificate['file_name']]);
            }

            if($request->has('marketplace'))
            {
                $marketplace_link = [];
                if(count($request->marketplace))
                {
                    foreach($request->marketplace as $row)
                    {
                        if($row['name'] || $row['link'])
                        {
                            $marketplace_link [] = $row;
                        }
                    }

                }

                $request->merge(['marketplace_link'=>json_encode($marketplace_link)]);
                
            }

            $request->merge(['menu_id'=>$menu->id]);
            $data->update($request->all());
            
            DB::commit();
            return redirect()->route('admin.post.index',$menu->slug)->with('success-message', ucwords($menu->name).' berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return redirect()->back()->with('error-message', $e->getMessage());
        }
    }

    public function destroy($slug, $id)
    {
        $data = Post::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }
}
