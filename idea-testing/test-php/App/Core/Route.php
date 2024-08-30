<?php

namespace App\Core;

class Route
{
    public static $routes = [];

    public static function set($method, $uri, $controllerAction): void
    {
        self::$routes[$uri] = [
            'method' => $method,
            'uri' => $uri,
            'controllerAction' => $controllerAction
        ];
    }

    public static function get($uri, $controllerAction): void
    {
        self::set('GET', $uri, $controllerAction);
    }

    public static function post($uri, $controllerAction): void
    {
        self::set('POST', $uri, $controllerAction);
    }

    public static function patch($uri, $controllerAction): void
    {
        self::set('PATCH', $uri, $controllerAction);
    }

    public static function put($uri, $controllerAction): void
    {
        self::set('PUT', $uri, $controllerAction);
    }

    public static function delete($uri, $controllerAction): void
    {
        self::set('DELETE', $uri, $controllerAction);
    }

    public function route(): void
    {
        $path = Request::path();
        foreach (self::$routes as $route) {
            if ($route['uri'] === $path['uri'] && $route['method'] === $path['method']) {
                $this->handle($route['controllerAction']);
                return;
            }
        }
        $this->abort();
    }

    public function handle($controllerAction): void
    {
        if (is_callable($controllerAction)) {
            call_user_func($controllerAction);
        } else {
            $controllerName = $controllerAction[0];
            $actionName = $controllerAction[1];
            if (!class_exists($controllerName)) {
                die('Controller class does not exist');
            }
            $controller = new $controllerName();
            if (!method_exists($controller, $actionName)) {
                die('Controller method does not exist');
            }
            $controller->$actionName();
        }
    }

    private function abort($code = 404): void
    {
        http_response_code($code);

        view($code);
    }
}
