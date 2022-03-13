<?php

namespace AkuKoder\MyKad\Test;

use AkuKoder\MyKad\Cleaner;
use AkuKoder\MyKad\Faker\MyKadProvider;
use AkuKoder\MyKad\Validator;
use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class MyKadFakerTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGeneratedString()
    {
        $this->faker->addProvider(new MyKadProvider($this->faker));

        $this->assertMatchesRegularExpression('/\w+/', $this->faker->mykad);
    }

    public function testGeneratedStringIsValid()
    {
        $this->faker->addProvider(new MyKadProvider($this->faker));

        $mykad = $this->faker->mykad;

        $validated = (new Validator())->validate($mykad);

        $this->assertTrue($validated);
    }
}