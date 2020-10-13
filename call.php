<?php 

require "vendor/autoload.php";


use App\Controller\Upload;

if ($_FILES) {
    $file = $_FILES;
    $callUpload = new Upload();
    $callUpload->image($file, $_POST['name']);
}