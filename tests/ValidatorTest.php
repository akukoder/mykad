<?php

namespace AkuKoder\MyKad\Test;

use Orchestra\Testbench\TestCase;
use AkuKoder\MyKad\Exceptions\InvalidCharacterException;
use AkuKoder\MyKad\Exceptions\InvalidCodeException;
use AkuKoder\MyKad\Exceptions\InvalidDateException;
use AkuKoder\MyKad\Exceptions\InvalidLengthException;
use AkuKoder\MyKad\Validator;

class ValidatorTest extends TestCase
{
    protected $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new Validator;
    }

    public function testDataIsValid()
    {
        $this->assertTrue($this->validator->validate('000125140884'));
    }

    public function testLengthException()
    {
        $this->expectException(InvalidLengthException::class);

        $this->validator->validate('871003417', true);
    }

    public function testCharacterException()
    {
        $this->expectException(InvalidCharacterException::class);

        $this->validator->validate('87I003417888', true);
    }

    public function testDateException()
    {
        $this->expectException(InvalidDateException::class);

        $this->validator->validate('000125140884', true);
    }

    public function testStateCodeException()
    {
        $this->expectException(InvalidCodeException::class);

        $this->validator->validate('871003007888', true);
    }

//    public function testValidInputException()
//    {
//        $this->assertTrue($this->validator->validate('801208-06-2000'));
//    }
//
//    public function testValidCheckException()
//    {
//        $this->assertTrue($this->validator->validate('801208-06-2000'));
//    }
//
//    public function testInvalidCheckException()
//    {
//        $this->assertFalse($this->validator->validate('800008-00-2000'));
//    }
}