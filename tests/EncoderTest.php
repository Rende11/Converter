<?php
namespace Tests;

require_once 'vendor/autoload.php';
use function App\Coders\Encoders\jsonEncode;

class EncoderTest extends \PHPUnit_Framework_TestCase {

  public function testJsonEncode (){
      $incomingArray = ["one" => 1, "two" => 2, "three" => 3];
      $expectedData = '{"one":1,"two":2,"three":3}';
      $this->assertEquals($expectedData,jsonEncode($incomingArray));
  }
}
