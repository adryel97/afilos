<?php 
namespace App\Model;

use CoffeeCode\Uploader\Image;

class UploadModel
{
    public function uploadImage($file, $name)
    {
        $callUpload  = new Image('upload', 'img', 600);
        $upload = $callUpload->upload($file, $name);

        return $upload;
    }
}