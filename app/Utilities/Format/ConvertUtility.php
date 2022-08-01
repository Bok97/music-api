<?php

namespace App\Utilities\Format;

class ConvertUtility
{
    public static function random6DigitCode()
    {
        return rand(100000, 999999);
    }

    public static function convertBoolean($data)
    {
        return $data === 1 ? true : false;
    }
}
