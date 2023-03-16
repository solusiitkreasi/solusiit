<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Upload
{
    public function upload($file, $folder, $fileName, $size=false)
    {
        if (!$file || !$file->isValid()) {
            return;
        }


        $file_name = $fileName.'.'.$file->getClientOriginalExtension();
        $file_size = $file->getSize();
        $file_extension = $file->getClientOriginalExtension();
        $file_original_name = $file->getClientOriginalName();
        // $fileName = $file->getClientOriginalName().strtotime('now').'.'.$file->getClientOriginalExtension();


        // if( $size==true ){
        //     $fileName = Str::uuid();
        //     // returns Intervention\Image\Image
        //     $resize = Image::make($file)->resize(700,465);
        //     // calculate md5 hash of encoded image
        //     $hash = md5($resize->__toString());
        //     // use hash as a name
        //     $path = "images\{$hash}.{$file->getClientOriginalExtension()}";
        //     // save it locally to ~/public/images/{$hash}.jpg
        //     $resize->save(public_path($path));
        //     Storage::disk('uploads')->put($folder.'/'.$file_name, $resize->__toString());
        //     //destroy
        //     $resize->destroy();
        //     unlink($path);
        //     return $folder.'/'.$file_name;
        // }

        $file->storeAs(
            'public/'.$folder,$file_name
        );

        $data = [
            'file_name' => 'public/'.$folder.'/'.$file_name,
            'file_size' => $file_size,
            'file_extension' => $file_extension,
            'file_original_name' => $file_original_name
        ];
        return $data;
    }
}
