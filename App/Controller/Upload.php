<?php 
namespace App\Controller;

use App\Model\UploadModel;

class Upload
{
    public function image($file, $name)
    {
        $callUpload = new UploadModel();
        $callUpload->uploadImage($file, $name);
    }
}
