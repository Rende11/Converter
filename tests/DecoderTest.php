<?php
require_once 'vendor/autoload.php';
use function App\Coders\Decoders\jsonDecode;
use function App\Coders\Decoders\iniDecode;

class DecodeTest extends \PHPUnit_Framework_TestCase {
  private $data = [];
  private $tmpFiles = [];
  private $expectedArray;

  protected function setUp (){

    $this->tmpFiles['json'] = 'jsonTmp.json';
    $this->tmpFiles['ini'] = 'iniTmp.ini';

    $this->data['json'] = '{"one": 1, "two": 2, "three": 3}';
    $this->data['ini'] = 'one=1
                          two=2
                          three=3';


    $this->expectedArray = ["one" => 1, "two" => 2, "three" => 3];

    foreach ($this->tmpFiles as $value){
      if (file_exists($value)){
        unlink($value);
      }
    }

    file_put_contents($this->tmpFiles['json'], $this->data['json']);
    file_put_contents($this->tmpFiles['ini'], $this->data['ini']);

  }

  public function testJsonDecode (){

      $this->assertEquals($this->expectedArray, jsonDecode($this->tmpFiles['json']));
  }

  public function testIniDecode (){

      $this->assertEquals($this->expectedArray, iniDecode($this->tmpFiles['ini']));
  }

  protected function tearDown (){
    foreach ($this->tmpFiles as $value){
      if (file_exists($value)){
        unlink($value);
      }
    }
  }
}
