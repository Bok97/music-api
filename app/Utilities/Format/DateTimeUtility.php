<?php

namespace App\Utilities\Format;

class DateTimeUtility
{
    public static function formateCommonDateTime($date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }

    public static function formatDateTimeToExtractMonth($dateTime)
    {
        if (empty($dateTime)) {
            return null;
        }
        $formateDateTime = strtotime($dateTime);
        return date('d F Y', $formateDateTime);
    }
}
