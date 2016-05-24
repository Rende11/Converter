<?php
namespace Index;
$targetExtension = 'json';
$saveFileName = 'temp';
$pathToParseFile = 'three.ini';

function getExtension ($path) {
  if(file_exists($path)){
    $info = pathinfo($path);
    return  $info['extension'];
  }
}

function decode ($path){
    $ext = getExtension($path);
    $file = file_get_contents($path);
    switch ($ext) {
      case 'json':
        return json_decode($file);
      case 'ini':
        return parse_ini_string($file);
      default :
        return -1;
    }
}

function encode ($array, $target){
    switch ($target) {
      case 'json':
        return json_encode($array);
      case 'ini':
        return 1;
      default:
        return -1;
    }
}

$a = decode ($pathToParseFile);
$b = encode ($a,$targetExtension);
var_dump($b);
file_put_contents("${saveFileName}.${targetExtension}",$b);
