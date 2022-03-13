<?php

namespace AkuKoder\MyKad\Internal;

use AkuKoder\MyKad\Exceptions\InvalidCodeException;

class State
{
    protected array $stateCodes = [];

    public string $name;

    public function __construct($input)
    {
        $this->name = $this->name($input);
        $this->stateCodes = require __DIR__.'/../config/state-codes.php';
    }

    /**
     * Get state name based on state code. The codes extracted from https://www.jpn.gov.my/my/kod-negeri,
     * on 2022-03-13
     *
     * @param string $input
     * @return string
     */
    public function name(string $input): string
    {
        $code = substr($input, 6, 2);

        if (! array_key_exists($code, $this->stateCodes)) {
            throw new InvalidCodeException;
        }

        return $this->stateCodes[$code];
    }
}