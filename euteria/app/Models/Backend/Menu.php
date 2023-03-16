<?php

namespace App\Models\Backend;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model implements TranslatableContract
{
    // use Sluggable;
    use Translatable;
    use LogsActivity;
    

    CONST TYPE_ARTICLE = 'article';
    CONST TYPE_HYPERLINK = 'hyperlink';
    CONST TYPE_RESELLER = 'reseller';
    CONST TYPE_PAGE = 'page';
    CONST TYPE_PRODUCT = 'product';
    CONST TYPE_GALLERY = 'gallery';
    CONST TYPE_TESTIMONY = 'testimony';
    CONST TYPE_FILE = 'file';
    CONST TYPE_VIDEO = 'video';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->order = $model->make_order();            
        });
    }

    protected $table = 'menus';
    protected $fillable = ['parent_id','type','order','is_active','status'];
    /* ACTIVITY LOG */
    protected static $logName = 'menu';
    protected static $logAttributes = ['parent_id', 'type','order','is_active','status'];
    /* TRANSLATEBLE */
    protected $translatedAttributes = ['name','slug'];

    /* RELATION */
    public function child()
    {
        return $this->hasMany('App\Models\Backend\Menu', 'parent_id');
    }

    public function post()
    {
        return $this->hasMany('App\Models\Backend\Post', 'menu_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Backend\Menu','parent_id')->withDefault([
            'name'=>'-'
        ]);
    }
    
    /* STATIF FUNCTION */
    public static function type()
    {
        $type = [
            self::TYPE_ARTICLE => 'Artikel/Blog',
            self::TYPE_PAGE => 'Halaman',
            self::TYPE_PRODUCT => 'Produk',
            self::TYPE_GALLERY => 'Galeri',
            self::TYPE_TESTIMONY => 'Testimoni',
            self::TYPE_FILE => 'File',
            self::TYPE_HYPERLINK => 'Hyperlink',
            self::TYPE_RESELLER => 'Reseller',
            self::TYPE_VIDEO => 'Video',
        ];

        if(Auth::user()->hasRole('superadmin'))
        {
            return $type;
        }else{
            return [
                self::TYPE_PAGE => 'Halaman',
            ];
        }
    }

    public static function menu_icon($type)
    {
        $data = [
            self::TYPE_ARTICLE =>'fa fa-file-alt',
            self::TYPE_PAGE => 'fa fa-file',
            self::TYPE_PRODUCT =>'fa fa-boxes',
            self::TYPE_GALLERY =>'fa fa-images',
            self::TYPE_TESTIMONY =>'fa fa-comment',
            self::TYPE_FILE => 'fa fa-file',
            self::TYPE_HYPERLINK =>'fa fa-link',
            self::TYPE_RESELLER =>'fa fa-users',
            self::TYPE_VIDEO =>'fa fa-video',
        ];

        return $data[$type];
        
    }

    /* PRIVATE FOR EVENT */
    private function make_order()
    {
        $data = self::whereNull('parent_id')->orderBy('order','DESC')->first();
        if($data)
        {
            return $data->order+1;
        }
        return 1;
    }
    /* GET MENU WITH CHILD */
    public function scopeSidebarMenu($query)
    {
        return $query->with(['child'])->whereNull('parent_id')->orderBy('order','ASC')->get();        
    }

    public function scopeHeaderMenu($query)
    {
        return $query->with(['child'])->whereNull('parent_id')->orderBy('order','ASC')->get();        
    }
    
    public function scopeHeaderMenuWithChild($query)
    {
        return $query->with(['child'])->orderBy('order','ASC')->get();        
    }

    public function scopeFindBySlug($query,$slug,$with=[])
    {
        if(count($with))
        {
            $query = $query->with($with);
        }
        $query = $query->whereTranslation('slug',$slug);
        return $query->count() ? $query->first():false;
        
    }

}
