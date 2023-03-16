<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class PostCategory extends Model implements TranslatableContract
{
    use LogsActivity;
    use Translatable;

    protected $table = 'post_categories';
    protected $fillable = ['parent_id','image'];

    /* translatable */
    protected $translatedAttributes = ['name','slug'];
    /* ACTIVITY LOG */
    protected static $logName = 'post_categories';
    protected static $logAttributes = ['image'];
    

    /* RELATION */
    public function child()
    {
        return $this->hasMany('App\Models\Backend\PostCategory', 'parent_id');
    }

    /* GET MENU WITH CHILD */
    public function scopeSidebarProduct($query)
    {
        return $query->with(['child'])->whereNull('parent_id')->get();        
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Backend\PostCategory','parent_id')->withDefault([
            'name'=>'-'
        ]);
    }
}
