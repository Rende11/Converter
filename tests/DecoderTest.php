<?php
namespace Tests;

require_once 'vendor/autoload.php';
use function App\Coders\Decoders\jsonDecode;
use function App\Coders\Decoders\iniDecode;

class DecodeTest extends \PHPUnit_Framework_TestCase {
  private $data = [];
  private $expectedArray;

  protected function setUp (){

      $this->expectedArray = ["one" => 1, "two" => 2, "three" => 3];

      $this->data['json'] = '{"one": 1, "two": 2, "three": 3}';
      $this->data['ini'] = 'one=1
                            two=2
                            three=3';
  }

  public function testJsonDecode (){
      $incomingString = $this->data['json'];
      $this->assertEquals($this->expectedArray, jsonDecode($incomingString));
  }

  public function testIniDecode (){
      $incomingString = $this->data['ini'];
      $this->assertEquals($this->expectedArray, iniDecode($incomingString));
  }

}
