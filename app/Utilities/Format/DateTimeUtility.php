<?php

namespace App\Utilities\Format;

class DateTimeUtility
{
    public static function formateCommonDateTime($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}
