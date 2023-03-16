<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PostImage;
use App\Traits\Response;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    use Response;

    public function destroy($id)
    {
        $data = PostImage::findOrFail($id);
        if($data)
        {
            $data->delete();
            return $this->success();
        }
        return $this->not_found();
    }

    public function post($post_id)
    {
        $data = PostImage::where('post_id',$post_id)->get();
        $default = [];
        // if(count($data))
        // {
            return $this->success($data);
        // }
        // return $this->success($default);

    }
}
