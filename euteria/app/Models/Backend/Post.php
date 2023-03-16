<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\PostTranslation;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model implements TranslatableContract
{
    
    use Translatable;
    use LogsActivity;

    protected $table = 'posts';
    /* translatable */
    protected $translatedAttributes = ['name','slug','description','address'];
    protected $fillable = [
        'menu_id','post_category_id','post_subcategory_id','post_brand_id','ms_kota_id','ms_provinsi_id',
        'post_date',
        'email',
        'coordinate',
        'brochure',
        'certificate',
        'sku',
        'marketplace_link',
        'phone_number',
        'keywords',
        'view_count',
        'year',
        'status'
    ];


    /* ACTIVITY LOG */
    protected static $logName = 'posts';
    protected static $logAttributes = ['menu_id','post_category_id','post_subcategory_id','post_brand_id','ms_kota_id','ms_provinsi_id',
        
    'post_date',
    'email',
    'coordinate',
    'brochure',
    'certificate',
    'sku',
    'marketplace_link',
    'phone_number',
    'keywords',
    'view_count',
    'year',
    'status'];

    /* name, category, type,  */
    protected $dates = ['post_date'];
    /* RELATION */
    public function menu()
    {
        return $this->belongsTo('App\Models\Backend\Menu');
    }

    public function post_brand()
    {
        return $this->belongsTo('App\Models\Backend\PostBrand');
    }

    public function post_category()
    {
        return $this->belongsTo('App\Models\Backend\PostCategory');
    }

    public function post_subcategory()
    {
        return $this->belongsTo('App\Models\Backend\PostSubCategory');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Utility\Provinsi','ms_provinsi_id','ms_provinsi_id');
    }
    
    public function kota()
    {
        
        return $this->belongsTo('App\Models\Utility\Kota','ms_kota_id','ms_kota_id');
    }

    public function tag_relation()
    {
        return $this->hasMany('App\Models\Backend\TagRelation','post_id');
    }
    public function post_image()
    {
        return $this->hasMany('App\Models\Backend\PostImage', 'post_id');
    }
    public function post_file()
    {
        return $this->hasMany('App\Models\Backend\PostFile', 'post_id');
    }
    
    /* SCOPE */
    public function scopePopular($query)
    {
        return $query->whereHas('menu',function($query){
            $query->whereType(Menu::TYPE_ARTICLE);
        })->orderBy('view_count','desc');
    }

    public function scopeSameCategory($query, $category_id)
    {
        return $query->where('category_id',$category_id)->orderBy('post_date','desc');
    }

    public function scopeFindByCategory($query,$category)
    {
        return $query->whereHas('category',function($query) use ($category){
            return $query->where('slug',$category);
        });
    }

    public function scopeSlideshow($query)
    {
        return $query->where('is_slideshow',1)->get();
    }

    public function scopeFindBySlug($query,$slug)
    {        
        $data = $query->whereTranslation('slug',$slug)->get();   
        return count($data) ? $data->first():false;        
    }

    public function scopeFindByMenu($query, $menu_slug, $paginate=null, $filter = [])
    {
        $slug = $menu_slug;        
        $data = $query->whereHas('menu',function($query) use ($slug){
            $query->whereTranslation('slug',$slug);
        });        

        if(count($filter))
        {
            if(isset($filter['category']) || isset($filter['subcategory']) ||isset($filter['brand']) )
            {
                
                $data->where(function($query) use ($filter){
                    if(isset($filter['brand']))
                    {   
                        if(isset($filter['category']))
                        {
                            if(isset($filter['subcategory']))
                            {
                                $query->whereIn('post_brand_id',$filter['brand'])
                                ->whereIn('post_category_id',$filter['category'])
                                ->whereIn('post_subcategory_id',$filter['subcategory']);
                            }else{
                                $query->whereIn('post_brand_id',$filter['brand'])
                                ->whereIn('post_category_id',$filter['category']);
                            }
                        }else{
                            $query->whereIn('post_brand_id',$filter['brand']);
                        }
                    }else{
                        if(isset($filter['category']))
                        {
                            if(isset($filter['subcategory']))
                            {
                                $query->whereIn('post_category_id',$filter['category'])
                                ->whereIn('post_subcategory_id',$filter['subcategory']);
                            }else{
                                $query->whereIn('post_category_id',$filter['category']);
                            }
                        }else{
                            if(isset($filter['subcategory']))
                            {
                                $query->whereIn('post_subcategory_id',$filter['subcategory']);
                            }
                        }
                    }


                    // $query->whereIn('post_category_id',isset($filter['category']) ? $filter['category']:[-1])
                    // ->whereIn('post_subcategory_id',isset($filter['subcategory']) ? $filter['subcategory']:[-1])
                    // ->orWhereIn('post_brand_id',isset($filter['brand']) ? $filter['brand']:[-1]);
                });
                
                // dd($data->toSql(), $filter);
            }

            if(isset($filter['kota']))
            {
                $data->where('ms_kota_id',$filter['kota']);
            }

            if(isset($filter['search']))
            {
                $data->whereTranslationLike('name','%'.$filter['search'].'%');
            }
        }

        if($data->count())
        {
            $first_data = $data->first();
            if($first_data->menu->type == 'article')
            {
                $data->orderBy('post_date','desc');
            }
        }


        $data = $paginate ? $data->paginate($paginate):$data->get();        
        
        return count($data) ? $data:[];        
    }

    public function scopeLatestPostByMenu($query, $menu_slug, $limit=null)
    {        
        $menu = Menu::whereTranslation('slug',$menu_slug)->first();
        $data = $query->whereHas('menu',function($query) use ($menu_slug){
            $query->whereTranslation('slug',$menu_slug);
        });
        if($data->count())
        {
            if($menu->type == Menu::TYPE_ARTICLE)
            {
                $data = $data->orderByDesc('post_date');
            }else{
                $data = $data->orderByDesc('created_at');
            }
            $data = $limit ? $data->limit($limit)->get():$data->get();
            
            return $data;
        }
        return [];
    }

    public function scopeFindByMenuType($query, $menu_type, $limit=null)
    {
        $type = $menu_type;        
        $data = $query->whereHas('menu',function($query) use ($type){
            $query->whereType($type);
        });

        $data = $limit ? $data->limit($limit)->get():$data->get();
        
        return count($data) ? $data:false;
    }

    public function scopeLatestPostByMenuType($query, $menu_type, $limit=null)
    {
        $type = $menu_type;        
        $data = $query->whereHas('menu',function($query) use ($type){
            $query->whereType($type);
        });
        if(count($data))
        {
            if($type == 'article')
            {
                $data = $data->orderByDesc('post_date');
            }else{
                $data = $data->orderByDesc('created_at');
            }
            $data = $limit ? $data->limit($limit)->get():$data->get();
            
            return $data;
        }
        return false;
    }

    public function getYoutubeThumbnailAttribute()
    {
        $default_link =  self::DefaultYoutubeLink();
        if($this->link)
        {
            $link = explode('watch?v=',$this->link);
            if(count($link) > 1)
            {
                $link = explode('&t',$link[1]);
            }else{
                $link = explode('watch?v=',$default_link);
                $link = explode('&t',$link[1]);
            }
        }else{
            $link = explode('watch?v=',$default_link);
            $link = explode('&t',$link[1]);
        }
        $thumbnail_link = "https://img.youtube.com/vi/".$link[0]."/hqdefault.jpg";
        return $thumbnail_link;
    }

    public function getYoutubeEmbedLinkAttribute()
    {
        $default_link =  self::DefaultYoutubeLink();
        if($this->link)
        {
            $link = explode('watch?v=',$this->link);
            if(count($link) > 1)
            {
                $link = explode('&t',$link[1]);
            }else{
                $link = explode('watch?v=',$default_link);
                $link = explode('&t',$link[1]);
            }
        }else{
            $link = explode('watch?v=',$default_link);
            $link = explode('&t',$link[1]);
        }
        $embed_link = "https://www.youtube.com/embed/".$link[0];
        return $embed_link;
    }

    public function getYoutubeLinkAttribute()
    {
        $link = explode('watch?v=',$this->link);
        if(count($link) > 1)
        {
            $link = $this->link;
        }else{
            $link = self::DefaultYoutubeLink();
        }
        return $link;
    }

    public static function DefaultYoutubeLink()
    {
        return 'https://www.youtube.com/watch?v=tjxh279x9s4';
    }

    public function getPostImagesAttribute()
    {
        $data = self::with(['post_image'])->find($this->id);
        if(count($data->post_image))
        {
            return $data->post_image;
        }
        return [];
    }

    public function getFirstImagesAttribute()
    {
        $data = self::with(['post_image'])->find($this->id);
        if(count($data->post_image))
        {
            return $data->post_image[0]->file_name;
        }        
        return '-';
    }

    public function getFirstFileAttribute()
    {
        $data = self::with(['post_file'])->find($this->id);
        if(count($data->post_file))
        {
            return $data->post_file[0]->file_name;
        }        
        return '-';
    }

    protected $appends = ['first_images','post_images','first_file','youtube_thumbnail', 'youtube_embed_link','youtube_link'];

    public static function contact_page($key)
    {
        $keywords = ['kontak','hubungi','contact','kontak-kami','hubungi-kami','contact-us'];

        if(in_array($key, $keywords)){
            return true;
        }
        return false;
    }

    public static function about_page($key)
    {
        $keywords = ['tentang','about','tentang-kami','about-us'];

        if(in_array($key, $keywords)){
            return true;
        }
        return false;
    }


    
}
