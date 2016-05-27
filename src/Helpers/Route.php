<?php
namespace App\Helpers\Route;

function getExtension ($path) {
    if(file_exists($path)){
        $info = pathinfo($path);
    return  $info['extension'];
  }
}

function getFormat ($string) {
    return substr ($string, strpos($string, '.') + 1 , strlen($string));
}
