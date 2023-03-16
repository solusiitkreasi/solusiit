<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    protected $table = 'post_files';
    protected $fillable = ['post_id','file_name','file_size','file_extension','file_original_name'];
    /* RELATION */
    public function post()
    {
        return $this->belongsTo('App\Models\Backend\Post');
    }

}
