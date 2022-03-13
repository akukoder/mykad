<?php

namespace AkuKoder\MyKad\Exceptions;

class InvalidLengthException extends \InvalidArgumentException
{
    protected $code = 411;
    protected $message = 'Invalid input length';
}