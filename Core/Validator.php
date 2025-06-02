<?php

namespace Core;
use DateTime;
class Validator
{
    public static function checkString($value, $min = 1, $max = INF)
    {

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function checkDate($value)
    {
        $format = 'Y-m-d';
        $date = DateTime::createFromFormat($format, $value);

        return $date && $date->format($format) === $value;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }


}