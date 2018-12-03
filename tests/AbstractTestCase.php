<?php
namespace Jersak\Tests\Versioning;

use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected $testDataSetSize;

    public function __construct()
    {
        parent::__construct();
        $this->testDataSetSize = getenv('TEST_DATASET_SIZE') ? getenv('TEST_DATASET_SIZE') : 50;
    }
}
