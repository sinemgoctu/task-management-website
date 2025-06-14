<?php

namespace Core;

use Core\Middleware\Middleware;
use Exception;

class Router
{

    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller,
            "middleware" => null
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add("POST", $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add("PUT", $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add("DELETE", $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add("PATCH", $uri, $controller);
    }

    public function only($key)
    {
        end($this->routes);
        $lastKey = key($this->routes);
        $this->routes[$lastKey]['middleware'] = $key;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                Middleware::resolve($route["middleware"]);

                return require base_path($route["controller"]);
            }
        }

        $this->abort();
    }

    protected function abort($status_code = 404)
    {
        http_response_code($status_code);

        require base_path("views/$status_code.php");
        die();
    }
}

