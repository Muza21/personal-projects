<?php

namespace App\Core;

abstract class Controller
{
    public static function view($view, $data = []): void
    {
        extract($data);
        require base_path("views/{$view}.php");
    }
}
