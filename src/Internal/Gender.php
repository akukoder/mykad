<?php

namespace AkuKoder\MyKad\Internal;

use AkuKoder\MyKad\Exceptions\InvalidCharacterException;

class Gender
{
    public int $value;

    public function __construct($input)
    {
        $this->value = $this->getGender($input);
    }

    /**
     * Get gender based on the input. Basically, even number is female and odd number is male
     *
     * @param string $input
     * @return int
     */
    private function getGender(string $input): int
    {
        $code = substr($input, -1, 1);

        if (! is_numeric($code)) {
            throw new InvalidCharacterException;
        }

        return (int) $code % 2;
    }
}