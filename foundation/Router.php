<?php

namespace Foundation;

use Foundation\Controllers\NotFoundController;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public $errorMethod = 'get404';

    public static function load($file)
    {
        $router = new static;

        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        $checkExist = array_key_exists($uri, $this->routes[$requestType]);

        $controller = ($checkExist ? $this->routes[$requestType][$uri][0] : NotFoundController::class);
        $method = ($checkExist ? $this->routes[$requestType][$uri][1] : $this->errorMethod);

        $controller = new $controller();

        return $controller->$method();
    }
}
