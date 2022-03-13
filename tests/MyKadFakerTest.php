<?php

namespace AkuKoder\MyKad\Test;

use AkuKoder\MyKad\Cleaner;
use AkuKoder\MyKad\Faker\MyKadProvider;
use AkuKoder\MyKad\Validator;
use Orchestra\Testbench\TestCase;

class MyKadFakerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGeneratedStringIsValid()
    {
        $mykad = (new MyKadProvider)->mykad();

        $validated = (new Validator())->validate($mykad);

        $this->assertTrue($validated);
    }
}