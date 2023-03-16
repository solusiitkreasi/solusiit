<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PostBrand extends Model
{
    use Sluggable;
    use LogsActivity;

    protected $table = 'post_brands';
    protected $fillable = ['name','slug','image'];

    /* ACTIVITY LOG */
    protected static $logName = 'post_brands';
    protected static $logAttributes = ['name', 'slug','image'];

    public function product()
    {
        return $this->hasMany('Apps\Models\Backend\Post','brand_id');
    }

    /* EXTENSION */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
