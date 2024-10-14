<?php

namespace App\Core;

class Container
{
    public array $bindings = [];

    public function bind($key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key): object
    {
        if (!array_key_exists($key, $this->bindings)) {
            die("No matching binding found for {$key}");
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
