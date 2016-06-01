<?php
namespace App\Helpers;

function getExtension ($path) {
    if(file_exists($path)){
        $info = pathinfo($path);
    return  $info['extension'];
  }
}

function getFormat ($string) {
    return substr ($string, strpos($string, '.') + 1 , strlen($string));
}

function parseFileToString ($path){
    return file_get_contents($path);
}
