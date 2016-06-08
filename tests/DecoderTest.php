<?php
namespace Tests;

use function App\Coders\Decoders\jsonDecode;
use function App\Coders\Decoders\iniDecode;

class DecodeTest extends \PHPUnit_Framework_TestCase {
  private $data = [];
  private $expectedArray;

  protected function setUp (){

      $this->expectedArray = ["one" => 1, "two" => 2, "three" => 3];

      $this->data['json'] = file_get_contents('tests/files/json.json');
      $this->data['ini'] = file_get_contents('tests/files/ini.ini');
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
