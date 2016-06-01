<?php
namespace Tests;

use function App\Helpers\getFormat;
use function App\Helpers\getExtension;
use function App\Helpers\parse;

class HelpTest extends \PHPUnit_Framework_TestCase {


    protected function setUp() {
        file_put_contents('ololo.ini','');
        file_put_contents('trololo.json','12345');
        file_put_contents('trolol2.jaon','');

    }

    public function testGetFormat() {
        $this->assertEquals('ini', getFormat('ololo.ini'));
        $this->assertEquals('json', getFormat('trololo.json'));
        $this->assertFalse('json' == getFormat('trolol2.jaon'));
    }

    public function testGetExtension() {
        $this->assertEquals('ini', getExtension('ololo.ini'));
        $this->assertEquals('json', getExtension('trololo.json'));
        $this->assertEquals('jaon', getExtension('trolol2.jaon'));
        $this->assertEquals(null, getExtension('trolol2jaon'));
    }

    public function testParse() {
        $this->assertEquals('', parse('ololo.ini'));
        $this->assertEquals('12345', parse('trololo.json'));
    }

    protected function tearDown() {
        unlink ('ololo.ini');
        unlink ('trololo.json');
        unlink ('trolol2.jaon');
    }
}
