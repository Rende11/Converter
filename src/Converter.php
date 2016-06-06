<?php
namespace App;

use function App\Coders\Decoders\jsonDecode;
use function App\Coders\Decoders\iniDecode;
use function App\Coders\Encoders\jsonEncode;
use function App\Helpers\saveFile;

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
    switch ($target) {
      case 'json':
        return jsonEncode($array);
      default:
        return -1;
    }
}
