<?php
namespace App\Coders\Decoders;

function jsonDecode ($string) {
    return json_decode($string, true);
}

function iniDecode ($string) {
    return parse_ini_string($string);
}
