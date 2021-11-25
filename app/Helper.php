<?php

namespace App;

use Carbon\Carbon;

class Helper
{
    public static function formatCode($code)
    {
        return str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', $code));
    }

    public function formatNumber($number)
    {
        $num_length = strlen($number);
        for ($i = $num_length; $i < 6; $i++)
        {
            $number = '0' . $number;
        }

        return $number;
    }

    public function formatNumberLength($number, $length = 2)
    {
        $num_length = strlen($number);
        for ($i = $num_length; $i < $length; $i++)
        {
            $number = '0' . $number;
        }

        return $number;
    }

    public function parseDateTime(array $date)
    {
        $day = $date[3];
        $day = Carbon::parse($day);
        $h = $date[0];
        $m = $date[1];
        $ampm = $date[2];
        return Carbon::create($day->year,$day->month,$day->day, $h,$m, $ampm);
    }
}
