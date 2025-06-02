<?php

use Core\Response;
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function abort($status_code = 404) {
    http_response_code($status_code);

    require base_path("views/$status_code.php");
    die();
}
function authorize($condition)
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path . ".view.php");
}
