<?php
namespace Tests;

use function App\decode;
use function App\encode;
use function App\convert;

class ConverterTest extends \PHPUnit_Framework_TestCase {

    private $string = [];
    private $expectedArray = [];

    protected function setUp() {
        $this->expectedArray = ["one" => 1, "two" => 2, "three" => 3];
        $this->string['json'] = file_get_contents('tests/files/json.json');
        $this->string['ini'] = file_get_contents('tests/files/ini.ini');
    }

    public function testDecode() {
        $this->assertEquals($this->expectedArray, decode($this->string['json'], 'json'));
        $this->assertEquals($this->expectedArray, decode($this->string['ini'], 'ini'));
        $this->assertEquals( -1, decode($this->string['ini'], 'iddqd'));
    }

    public function testEncode() {
        $incomingArray = $this->expectedArray;
        $expectedJson = $this->string['json'];
        $this->assertEquals($expectedJson,encode($incomingArray,'json'));
        $this->assertEquals(-1,encode($incomingArray,'txt'));
    }

    // public function testConvert(){
    //     $file = 'test.ini';
    //     $target = 'ololo.json';
    //
    //     $output2 = $this->string['json'];
    //     // $output = $this->string['json2'];
    //
    //     file_put_contents($file,$this->string['ini']);
    //     convert($file,$target);
    //     // $this->assertEquals($output, file_get_contents($target));
    //     $this->assertEquals($output2, file_get_contents($target));
    //     unlink($file);
    // }
}
