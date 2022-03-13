<?php

namespace AkuKoder\MyKad;

use AkuKoder\MyKad\Internal\Gender;
use AkuKoder\MyKad\Internal\State;
use Carbon\Carbon;

class Extractor
{
    protected string $input;

    /**
     * Class constructor
     *
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->input = $input;
    }

    /**
     * Get date of birth from input.
     *
     * @param string $format    The date formatter
     * @return string
     */
    public function dateOfBirth(string $format = 'Y-m-d'): string
    {
        $year = substr($this->input, 0, 2);
        $year += ($year >= 50 ? 1900 : 2000);

        $month = substr($this->input, 2, 2);
        $day = substr($this->input, 4, 2);

        return Carbon::parse($year.'-'.$month.'-'.$day)->format($format);
    }

    /**
     * Get state name from the input.
     *
     * @return string
     */
    public function stateName(): string
    {
        return (new State($this->input))->name;
    }

    /**
     * Get gender from input. Basically, even number is female and odd number is male.
     *
     * @return int
     */
    public function gender(): int
    {
        return (new Gender($this->input))->value;
    }
}