<?php

namespace AkuKoder\MyKad\Test;

use AkuKoder\MyKad\Exceptions\InvalidCharacterException;
use AkuKoder\MyKad\Internal\Gender;
use Orchestra\Testbench\TestCase;

class GenderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testOutputIsNotInteger()
    {
        $this->expectException(InvalidCharacterException::class);

        (new Gender('12311desdf'))->value;
    }

    public function testResultIsFemale()
    {
        $this->assertEquals(0, (new Gender('871003417888'))->value);
    }

    public function testResultIsMale()
    {
        $this->assertEquals(1, (new Gender('871003417889'))->value);
    }
}