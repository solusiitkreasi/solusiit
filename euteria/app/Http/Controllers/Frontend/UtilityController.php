<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\Post;
use App\Models\Utility\Provinsi;
use App\Traits\Response;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    use Response;

    public function provinsi(Request $request)
    {
        $data = Provinsi::query();

        if($request->has('ms_provinsi_id'))
        {
            // $data = $data->select('ms_provinsi_id','nama_provinsi')->get();
            $data = $data->with(['kota'=> function($query){
                $query->whereNotNull('ms_provinsi_id')->where('nama_kota','NOT LIKE','%provinsi%');
            }])->find($request->ms_provinsi_id);
        }else{
            $data = $data->select('ms_provinsi_id','nama_provinsi')->get();
        }
        
        return $this->success(['data'=>$data]);
    }

    public function menu(Request $request, $slug)
    {
        $menu = Menu::findBySlug($slug);
        if(!$menu) return $this->not_found();
        $filter = [];
        if($request->has('category'))
        {
            $filter['category'] = $request->category;
        }

        if($request->has('brand'))
        {
            $filter['brand'] = $request->brand;
        }

        if($request->has('kota'))
        {
            $filter['kota'] = $request->kota;
        }

        
        $limit = 12;

        if($menu->type == Menu::TYPE_ARTICLE)
        {
            $limit = 9;
        }

        if($menu->type == Menu::TYPE_RESELLER)
        {
            $limit = 10;
        }

        $post = Post::findByMenu($slug,$limit, $filter); 
        if($menu->type == Menu::TYPE_PAGE)
        {            
            $post = Post::findBySlug($slug);
        }

        if($menu->type == Menu::TYPE_HYPERLINK)
        {            
            $post = Post::findBySlug($slug);
            
            if($post->slug)
            {
                if (strpos($post->slug, 'http') && strpos($post->slug,'https')) {
                    return redirect()->to($post->slug);
                }

                /* CONTACT PAGE */
                if(Post::contact_page($post->slug))
                {
                    return $this->contact();
                }

                /* ABOUT */
                if(Post::about_page($post->slug))
                {
                    return $this->about();
                }

                return redirect($post->slug);
            }else{
                return redirect()->route('index.404');
            }
        }
        
        return $this->success($post ? $post:[]);
    }
    

}
