<?php
require_once 'src/Coders/Decoders/Decode.php';
use function App\Coders\Decoders\jsonDecode;

class DecodeTest extends \PHPUnit_Framework_TestCase {
  private $data;
  private $jsonFile;
  private $expectedArray;

  protected function setUp (){

    $this->jsonFile = 'jsonTmp';
    $this->data = '{"one": 1, "two": 2, "three": 3}';
    $this->expectedArray = [
      "one" => 1,
      "two" => 2,
      "three" => 3
    ];

    if (file_exists($this->jsonFile)){
      unlink($this->jsonFile);
    }

    file_put_contents($this->jsonFile, $this->data);

  }

  public function testJsonDecode (){
      $this->assertEquals($this->expectedArray, jsonDecode($this->jsonFile));
  }

  protected function tearDown (){
    if (file_exists($this->jsonFile)){
      unlink($this->jsonFile);
    }
  }
}
