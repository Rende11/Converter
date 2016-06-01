<?php
namespace App\Coders\Decoders;

function jsonDecode ($path) {
    $string = file_get_contents($path);
    return json_decode($string, true);
}

function iniDecode ($path) {
    $string = file_get_contents($path);
    return parse_ini_string($string);
}
