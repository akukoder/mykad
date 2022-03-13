<?php

namespace AkuKoder\MyKad\Test;

use AkuKoder\MyKad\Cleaner;
use Orchestra\Testbench\TestCase;

class CleanerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testOutputIsString()
    {
        $this->assertIsString((new Cleaner)->clean('12311desdf'));
    }

    public function testCleanUpDashes()
    {
        $this->assertStringNotContainsString('-', (new Cleaner)->clean('871003-41-7888'));
    }

    public function testCleanUpSpaces()
    {
        $this->assertStringNotContainsString(' ', (new Cleaner)->clean('871003 41 7888'));
    }
}