<?php
namespace App\Index;

require_once "Decoders\Decode.php";
require_once "Encoders\Encode.php";
require_once "Helpers\Route.php";

use function Decoders\Decode\jsonDecode;
use function Decoders\Decode\iniDecode;

use function Encoders\Encode\jsonEncode;

use function Helpers\Route\getExtension;
use function Helpers\Route\getFormat;


$parseFile = $argv[1];
$saveFile = $argv[2];

convert($parseFile, $saveFile);

function decode ($path){
    $ext = getExtension($path);
    $file = file_get_contents($path);

    switch ($ext) {
      case 'json':
        return jsonDecode ($file);
      case 'ini':
        return iniDecode ($file);
      default :
        return -1;
    }
}


function encode ($array, $target){
    $format = getFormat($target);

    switch ($format) {
      case 'json':
        return jsonEncode($array);
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
