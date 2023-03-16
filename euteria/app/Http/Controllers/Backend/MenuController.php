<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Backend\Menu;
use App\Models\Backend\Post;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{

    use Response;

    public function source()
    {
        $query = Menu::query();
        $query->with(['parent']);
        $query->orderBy('order');        
        return DataTables::eloquent($query)        
        ->filter(function ($query) {
            if (request()->has('search')) {
                $query->whereTranslationLike('name', '%'.request('search')['value'].'%');
            }
        })
        ->editColumn('name', function ($data) {
            return ucwords($data->name);
        })
        ->editColumn('type', function ($data) {
            return ucwords($data->type);
        })
        ->editColumn('parent', function ($data) {
            return $data->parent ? $data->parent->name:'-';
        })
        ->addIndexColumn()
        ->addColumn('action', 'backend.menu.index-action')
        ->addColumn('order', function($data) use ($query){
            return view('backend.menu.order-action',compact(['data','query']));
        })
        ->rawColumns(['action','order'])
        ->toJson();
    }

    public function index()
    {
        return view('backend.menu.index');
    }
    
    public function create()
    {
        $data = null;
        return view('backend.menu.form',compact(['data']));
    }

    public function store(MenuRequest $request)
    {
        
        DB::beginTransaction();
        try {            
            $menu = Menu::create($request->all());
            
            /* HYPERLINK */
            if($request->type == Menu::TYPE_HYPERLINK || $request->type == Menu::TYPE_PAGE )
            {
                $request->merge(['menu_id'=>$menu->id]);
                $post = Post::create($request->all());
                // return $request->all();
            }

            // /* PAGE */
            // if($request->type == Menu::TYPE_HYPERLINK)
            // {
            //     $request->merge(['menu_id'=>$menu->id]);
            //     $post = Post::create($request->all());
            //     // return $request->all();
            // }

            DB::commit();
            return redirect()->route('admin.menu.index')->with('success-message','Menu berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
            
        }
    }

    public function show($id)
    {
        $data = Menu::findOrFail($id);
        return view('backend.menu.show',compact(['data']));
    }

    public function edit($id)
    {

        if($id < 6)
        {
            return redirect()->route('admin.menu.index')->with('error-message','Forbidden Access');
        }

        $data = Menu::findOrFail($id);
        return view('backend.menu.form',compact(['data']));
    }

    public function update(MenuRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = Menu::findOrFail($id);
            $data->slug = null;            
            
            $data->update($request->all());
            /* PAGE */
            if($data->type == Menu::TYPE_HYPERLINK || $data->type == Menu::TYPE_PAGE)
            {
                $request->merge(['menu_id'=>$data->id]);
                $post = Post::where('menu_id',$data->id)->first();
                $post->slug = null;
                $post->update($request->all());
                // return $request->all();
                // return $post;
            }
            DB::commit();
            return redirect()->route('admin.menu.index')->with('success-message','Menu berhasil dirubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = Menu::find($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    public function order($type,$id)
    {
        $data = Menu::findOrFail($id);        
        if($type == 'up' || $type = 'down')
        {
            if($type == 'up')
            {
                $new_oder = $data->order-1;
                
                $before_data = Menu::where('order',$new_oder)->whereNull('parent_id')->first();
                if($before_data)
                {
                    $before_order = $before_data->order + 1;
                    $before_data->update([
                        'order'=> $before_order
                    ]);
                    $data->update([
                        'order'=> $new_oder
                    ]);
                }
                return $this->success();
            }elseif($type == 'down'){
                $new_oder = $data->order + 1;
                
                $before_data = Menu::where('order',$new_oder)->whereNull('parent_id')->first();
                if($before_data)
                {
                    $before_order = $before_data->order - 1;
                    $before_data->update([
                        'order'=> $before_order
                    ]);
                    $data->update([
                        'order'=> $new_oder
                    ]);
                }
                return $this->success();
            }else{
                return $this->not_found();
            }

        }
        return $this->not_found();
    }
}
