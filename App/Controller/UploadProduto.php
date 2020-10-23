<?php 
namespace App\Controller;


use CoffeeCode\Uploader\Image;


class UploadProduto
{
    /**
     * @param mixed $imagem
     * @return string
     */
    public function uploadImagem($imagem): String
    {
        $upload = new Image('upload', 'produtos', false);
        $teste = $upload->upload($imagem, md5($imagem['name']), 350);
        return $teste;
    }
}