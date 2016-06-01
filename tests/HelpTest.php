<?php
namespace Tests;

require_once 'vendor/autoload.php';
use function App\Helpers\getFormat;
use function App\Helpers\getExtension;

class HelpTest extends \PHPUnit_Framework_TestCase {

    public function testGetFormat() {
        $this->assertEquals('ini', getFormat('ololo.ini'));
        $this->assertEquals('json', getFormat('trololo.json'));
        $this->assertFalse('json' == getFormat('trolol2.jaon'));
    }

    public function testGetExtension() {
        file_put_contents('ololo.ini','');
        file_put_contents('trololo.json','');
        file_put_contents('trolol2.jaon','');

        $this->assertEquals('ini', getExtension('ololo.ini'));
        $this->assertEquals('json', getExtension('trololo.json'));
        $this->assertEquals('jaon', getExtension('trolol2.jaon'));

        unlink('ololo.ini');
        unlink('trololo.json');
        unlink('trolol2.jaon');
    }

}
