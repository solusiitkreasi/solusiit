<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Menu;
use App\Models\Backend\Post;
use App\Models\Backend\Setting;
use App\Models\Utility\Feedback;
use App\Traits\Response;
use App\Traits\Seo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{

    use Seo;
    use Response;

    public function __construct()
    {
        $this->default_logo = asset(Setting::getValue('logo'));
        $this->meta_title = Setting::getValue('meta_title');
        $this->meta_keywords = explode(',',Setting::getValue('meta_keywords'));
        $this->meta_description = Setting::getValue('meta_description');
    }

    public function index()
    {
        $this->meta(ucwords(__('front.home')),$this->meta_description,$this->meta_keywords,$this->default_logo);        
        return view('frontend.index.index');
    }

    

    public function menu(Request $request, $slug)
    {
        
        $menu = Menu::findBySlug($slug);
        if(!$menu) return redirect()->route('index.404');

        $filter = [];
        
        if($request->has('category'))
        {
            
            if($request->category)
            {
                $filter['category'] = explode(',',$request->category);
            }
        }
        
        if($request->has('subcategory'))
        {
            
            if($request->subcategory)
            {
                $filter['subcategory'] = explode(',',$request->subcategory);
            }
        }

        if($request->has('brand'))
        {
            
            if($request->brand)
            {
                $filter['brand'] = explode(',',$request->brand);
            }
            
        }

        if($request->has('kota'))
        {
            $filter['kota'] = $request->kota;
        }

        if($request->has('search'))
        {
            $filter['search'] = $request->search;
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

        $this->meta(ucwords($menu->name),'',$this->meta_keywords,$this->default_logo);
        return view('frontend.post.'.$menu->type.'.index',compact(['post','menu']));
    }
    
    public function show($menu_slug, $post_slug)
    {
        $menu = Menu::findBySlug($menu_slug,['post']);
        if(!$menu) return redirect()->route('index.404');
        $post = Post::findBySlug($post_slug);          
        
        if(!$post) return redirect()->route('index.404');
        $post->increment('view_count',1);
        // return $post;
        $this->meta(ucwords($post->name),Str::limit(strip_tags($post->description),160),$this->meta_keywords,asset($post->first_images));
        return view('frontend.post.'.$menu->type.'.show',compact(['post','menu']));        
    }

    /* ABOUT US / TENTANG KAMI */
    public function about()
    {
        $post = Post::findBySlug('about-us');
        $this->meta(ucwords($post->name),'Official website St Morita',$this->meta_keywords,$this->default_logo);

        return view('frontend.index.about-us');
    }
    
    public function contact()
    {
        $post = Post::findBySlug('contact-us');    
        $this->meta(ucwords($post->name),$this->meta_description,$this->meta_keywords,$this->default_logo);
        return view('frontend.contact.index');
    }

    public function not_found()
    {
        $this->meta('404 Not Found',$this->meta_description,$this->meta_keywords,$this->default_logo);
        return view('frontend.error.404');
    }
}
