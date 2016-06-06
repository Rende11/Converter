<?php
namespace Tests;

use function App\decode;

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

    
}
