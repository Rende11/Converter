<?php
namespace App\Decode;

function jsonDecode ($path) {
    return json_decode($path);
}

function iniDecode ($path) {
    return parse_ini_string($path);
}
