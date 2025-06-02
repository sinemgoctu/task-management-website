<?php

namespace Core\Middleware;

use Exception;

class Middleware
{

    const MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $map = static::MAP;
        $middleware = isset($map[$key]) ? $map[$key] : false;


        if (!$middleware) {
            throw new Exception("No matching middleware found for key '$key'.");
        }

        (new $middleware)->handle();
    }
}