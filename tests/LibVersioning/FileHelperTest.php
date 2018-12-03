<?php

namespace Jersak\Tests\Versioning;

use Jersak\Versioning\FileHelper;
use Jersak\Tests\Versioning\AbstractTestCase;

class FileHelperTest extends AbstractTestCase
{
    public function testGetVersionFromGoodFile()
    {
        $fhelper = new FileHelper;

        $mockFile = [
            "version" => '1.0',
            "date" => date("d-m-Y h:i:sa", strtotime('now')),
        ];

        $this->assertEquals($fhelper->getVersionFromFile($mockFile), '1.0');
    }

    public function testGetVersionFromBadFile()
    {
        $fhelper = new FileHelper;

        $mockFile = 'bla';

        $this->assertEquals($fhelper->getVersionFromFile($mockFile), null);
    }

    public function testGetVersionFromInexistentFile()
    {
        $fhelper = new FileHelper;

        $mockFile = false;

        $this->assertEquals($fhelper->getVersionFromFile($mockFile), null);
    }
}
