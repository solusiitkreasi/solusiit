<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class TagRelation extends Model
{
    protected $table = 'tag_relations';
    protected $fillable = ['post_id','tag_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Backend\Post');
    }
    public function tag()
    {
        return $this->belongsTo('App\Models\Backend\Tag');
    }
}
