<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Sluggable;
    
    protected $table = 'tags';
    protected $fillable = ['name'];
    /* RELATION */
    public function tag_relation()
    {
        return $this->hasMany('App\Models\Backend\TagRelation', 'tag_id');
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
