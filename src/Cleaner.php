<?php

namespace AkuKoder\MyKad;

class Cleaner
{
    /**
     * Clean-up the input and remove unnecessary characters
     *
     * @param string $input
     * @return string
     */
    public function clean(string $input): string
    {
        $input = trim($input);
        $input = str_replace('-', '', $input);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $input);
    }
}