<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;


class uploadImage{


    public static function upload($file , $path){
           
        $imagePath =  $file->store($path);

        return $imagePath;
    }


    public static function deleteImage($image){

        if ($image == NULL) {
            return;
        }

        $path = substr($image , 8);

        if (Storage::disk('public')->exists($path)) {
              Storage::disk('public')->delete($path);
        }
    }
}