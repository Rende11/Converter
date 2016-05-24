<?php
namespace Index;


$parseFile = $argv[1];
$saveFile = $argv[2];

convert($parseFile, $saveFile);


function getExtension ($path) {
  if(file_exists($path)){
    $info = pathinfo($path);
    return  $info['extension'];
  }
}

function getFormat ($string){
    return substr ($string, strpos($string, '.') + 1 , strlen($string));
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

    $format = getFormat($target);
    switch ($format) {
      case 'json':
        return json_encode($array);
      case 'ini':
        return 1;
      default:
        return -1;
    }
}



function convert ($from, $to){
    $array = decode($from);

    $data = encode($array, $to);
    var_dump($data);
    file_put_contents($to,$data);
}
