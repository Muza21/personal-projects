<?php

use App\Core\Controller;
use App\Core\Helpers;

if (!function_exists('dd')) {
    function dd($value)
    {
        Helpers::dd($value);
    }
}

if (!function_exists('base_path')) {
    function base_path($path)
    {
        return Helpers::base_path($path);
    }
}

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        return Controller::view($view, $data);
    }
}
