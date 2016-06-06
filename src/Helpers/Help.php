<?php
namespace App\Helpers;

function getExtension ($path) {
    if(file_exists($path)){
        return pathinfo($path)['extension'];
    }

}

function getFormat ($string) {
    return substr ($string, strpos($string, '.') + 1 , strlen($string));
}


function parse ($parseFile){
    return file_get_contents($parseFile);
}

function saveFile($data, $path){
    file_put_contents($path,$data);
}
