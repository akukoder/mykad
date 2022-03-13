<?php

namespace AkuKoder\MyKad\Exceptions;

class InvalidCodeException extends \InvalidArgumentException
{
    protected $code = 414;
    protected $message = 'Invalid state/country code';
}