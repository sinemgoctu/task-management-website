<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function authorize($condition)
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }

}

function isValidDate($datetime)
{
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, $datetime);

    return $date && $date->format($format) === $datetime;
}

function base_path($path)
{
    return BASE_PATH . $path;
}
