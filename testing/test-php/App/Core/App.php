<?php

namespace App\Core;

class App
{
    public static $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function bind($key, $resolver): void
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key): void
    {
        static::container()->resolve($key);
    }
}
