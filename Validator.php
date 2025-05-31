<?php

class Validator
{
    public static function checkString($value, $min = 1, $max = INF){

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function checkDate($value){
        $format = 'Y-m-d';
        $date = DateTime::createFromFormat($format, $value);

        return $date && $date->format($format) === $value;
    }
}