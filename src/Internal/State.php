<?php

namespace AkuKoder\MyKad\Internal;

class State
{
    const INVALID_VALUE = 'Invalid';

    public string $name;

    public function __construct($input)
    {
        $this->name = $this->name($input);
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

        switch ($code) {
            // Johor
            case '01':
            case '21':
            case '22':
            case '23':
            case '24':
                return 'Johor';

            // Kedah
            case '02':
            case '25':
            case '26':
            case '27':
                return 'Kedah';

            // Kelantan
            case '03':
            case '28':
            case '29':
                return 'Kelantan';

            // Melaka
            case '04':
            case '30':
                return 'Melaka';

            // Negeri Sembilan
            case '05':
            case '31':
            case '59':
                return 'Negeri Sembilan';

            // Pahang
            case '06':
            case '32':
            case '33':
                return 'Pahang';

            // Pulau Pinang
            case '07':
            case '34':
            case '35':
                return 'Pulau Pinang';

            // Perak
            case '08':
            case '36':
            case '37':
            case '38':
            case '39':
                return 'Perak';

            // Perlis
            case '09':
            case '40':
                return 'Perlis';

            // Selangor
            case '10':
            case '41':
            case '42':
            case '43':
            case '44':
                return 'Selangor';

            // Terengganu
            case '11':
            case '45':
            case '46':
                return 'Terengganu';

            // Sabah
            case '12':
            case '47':
            case '48':
            case '49':
                return 'Sabah';

            // Sarawak
            case '13':
            case '50':
            case '51':
            case '52':
            case '53':
                return 'Sarawak';

            // Wilayah Persekutuan (Kuala Lumpur)
            case '14':
            case '54':
            case '55':
            case '56':
            case '57':
                return 'Wilayah Persekutuan Kuala Lumpur';

            // Wilayah Persekutuan (Labuan)
            case '15':
            case '58':
                return 'Wilayah Persekutuan Labuan';

            // Wilayah Persekutuan (Putrajaya)
            case '16':
                return 'Wilayah Persekutuan Putrajaya';

            // Negeri Tidak Diketahui
            case '82':
                return 'Unknown';

            default:
                return self::INVALID_VALUE;
        }
    }
}