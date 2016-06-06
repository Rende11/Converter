<?php
namespace Tests;

use function App\decode;
use function App\encode;

class ConverterTest extends \PHPUnit_Framework_TestCase {

    private $string = [];
    private $expectedArray = [];

    protected function setUp() {
        $this->expectedArray = ["one" => 1, "two" => 2, "three" => 3];
        $this->string['json'] = '{"one":1,"two":2,"three":3}';
        $this->string['ini'] = 'one=1
                                two=2
                                three=3';
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
}
