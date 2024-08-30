<?php

namespace App\Core;

class Helpers
{
    public static function dd($value): void
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

    public static function base_path($path): string
    {
        return BASE_PATH . $path;
    }
}
