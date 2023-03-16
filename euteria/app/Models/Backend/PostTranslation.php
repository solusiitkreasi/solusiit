<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use Sluggable;

    protected $table = 'post_translations';
    protected $fillable = ['name','slug','description','address'];

    protected static $logName = 'post_translations';
    protected static $logAttributes = ['name','slug','description','address'];

    public function post()
    {
        return $this->belongsTo('App\Models\Backend\Post');
    }

    /* EXTENSION */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
