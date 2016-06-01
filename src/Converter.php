<?php
namespace App;

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

function convert ($parseFile, $saveFile){

    $extension = getExtension($parseFile);
    $string = parse($parseFile);
    $array = decode ($string, $extension);
    $data = encode($array);
    saveFile($data);
}

$extension = getExtension($parseFile);

function parse ($parseFile){
    return file_get_contents($parseFile);
}

switch ($ext) {
  case 'json':
    return jsonDecode ($file);
  case 'ini':
    return iniDecode ($file);
  default :
    return -1;
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
