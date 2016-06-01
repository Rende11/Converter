<?php
namespace App;

use function Decoders\Decode\jsonDecode;
use function Decoders\Decode\iniDecode;
//
// use function Encoders\Encode\jsonEncode;
//
// use function Helpers\Route\getExtension;
// use function Helpers\Route\getFormat;
//
//
// $parseFile = $argv[1];
// $saveFile = $argv[2];
//
// convert($parseFile, $saveFile);
//
function convert ($parseFile, $saveFile){

    $extension = getExtension($parseFile);
    $targetFormat = getFormat($saveFile);
    $string = parse($parseFile);
    $array = decode ($string, $extension);
    $data = encode($array,$targetFormat);
    saveFile($data, $saveFile);
}

function decode ($string, $extension) {
    switch ($extension) {
        case 'json':
            return jsonDecode ($string);
        case 'ini':
            return iniDecode ($string);
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
