<?php

namespace AkuKoder\MyKad\Faker;

use Illuminate\Support\Carbon;

class MyKadProvider
{
    protected array $codes = [];

    public function __construct()
    {
        $this->codes = require __DIR__.'/../../config/state-codes.php';
    }

    /**
     * Generate random MyKad number
     *
     * @return string
     */
    public function mykad(): string {
        $date = Carbon::now();
        $output = null;

        $subYear = rand(0, 45);
        $subMonth = rand(1, 12);
        $subday = rand(1, 31);

        $date = $date->subYears($subYear);
        $date = $date->subMonths($subMonth);
        $date = $date->subDays($subday);

        $output .= $date->format('ymd');

        // get state code
        $randKey = array_rand($this->codes);
        $output .= $randKey;

        // generate last 4 digits randomly
        $output .= rand(1000, 9999);

        return $output;
    }
}