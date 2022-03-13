<?php

namespace AkuKoder\MyKad\Test;

use AkuKoder\MyKad\Cleaner;
use AkuKoder\MyKad\Extractor;
use AkuKoder\MyKad\Internal\State;
use Orchestra\Testbench\TestCase;

class ExtractorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testDateOfBirth()
    {
        $this->assertEquals('1987-10-03', (new Extractor('871003417888'))->dateOfBirth());
    }

    public function testDateOfBirthFormatted()
    {
        $this->assertEquals('03/10/1987', (new Extractor('871003417888'))->dateOfBirth('d/m/Y'));
    }

    public function testStateNameIsValid()
    {
        $this->assertEquals('Selangor', (new Extractor('871003417888'))->stateName());
    }

    public function testStateNameIsInvalid()
    {
        $this->assertEquals(State::INVALID_VALUE, (new Extractor('871003007888'))->stateName());
    }

}