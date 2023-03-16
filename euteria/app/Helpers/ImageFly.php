<?php

// namespace App\Helpers;

use App\Models\Backend\Simanja;

if (!function_exists('imageFly')) {
    /**
     * Get image and resize on the fly
     * @example: <img src="{{ asset(imageFly($user->photo, [385, 385])) }}" alt="" width="100%">
     * @param  string $path      relative path to file
     * @param  array  $dimension ['width', 'height'] of the image
     * @return string            relative path to the resized image
     */
    function imageFly($path, array $dimension)
    {
        if (file_exists($path)) {
            $dimensi_string = implode('_', $dimension);
            $extension = strrchr($path, '.');

            $edited = str_replace($extension,'_'.$dimensi_string,$path);

            $exist_image = $edited.$extension;

            
            if(file_exists($exist_image))
            {
                return $exist_image;
            }else{
                
                $image = Image::make($path);
                $resizedImagePath = $image->dirname
                    . '/' . $image->filename
                    . '_' . implode('_', $dimension)
                    . '.' . $image->extension;
                if (!file_exists($resizedImagePath)) {
                    $image->fit($dimension[0], $dimension[1]);
                    $image->save($resizedImagePath);
                }
                return $resizedImagePath;
            }

        }
        // else{
        //     $source = file_get_contents($path);
        //     $replace = asset('storage/image/simanja/'.str_replace(Simanja::BASE_URL,'',$source));
        //     return $replace;
        //     // file_put_contents($replace, $source);

        //     // $image = Image::make($replace);
        //     // $resizedImagePath = $image->dirname
        //     //     . '/' . $image->filename
        //     //     . '_' . implode('_', $dimension)
        //     //     . '.' . $image->extension;
        //     // if (!file_exists($resizedImagePath)) {
        //     //     $image->fit($dimension[0], $dimension[1]);
        //     //     $image->save($resizedImagePath);
        //     // }
        //     // return $resizedImagePath;
        //     // return $image->dirname;
        // }
        return '';
    }
}