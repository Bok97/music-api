<?php

namespace App\Utilities\Format;

class MoneyUtility
{
    public static function formatPriceToDecimal($amountCents)
    {
        return number_format($amountCents / 100, 2);
    }
}
