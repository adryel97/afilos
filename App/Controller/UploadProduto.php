<?php 
namespace App\Controller;

use CoffeeCode\Uploader\Image;

class UploadProduto
{
    public function uploadImagem($imagem)
    {
        $upload = new Image('upload', 'produtos', false);
        $teste = $upload->upload($imagem, md5($imagem['name']), 350);
        return $teste;
    }
}