<?php 
namespace App\Controller;

use CoffeeCode\Uploader\Image;

class UploadProduto
{
    private function uploadImagem($imagem)
    {
        $upload = new Image('upload', 'produtos', false);
        $upload->upload($imagem, md5($imagem['name']), 350);
    }

    public function insertImagem($imagem)
    {
        if(!empty($imagem)){
            $this->uploadImagem($imagem);
            return true;
        } else {
            return false;
        }
    }
}