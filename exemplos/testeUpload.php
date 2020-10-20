<?php
require "vendor/autoload.php";

use CoffeeCode\Uploader\Image;

$upload = new Image('upload', 'produtos', false);

if(!empty($_FILES['imagem'])){
    $file = ($_FILES['imagem']);
    $upload->upload($file, md5($file['name']), 350);
} else {
    echo "não contem imagem";
}