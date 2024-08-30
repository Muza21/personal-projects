<?php

namespace App\Core;

class Request
{
    public static function path(): array
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        return [
            'uri' => $uri,
            'method' => $method,
        ];
    }
}
