<?php

use Core\Response;
use Core\Session;

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

function uriIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
  http_response_code($code);

  require base_path("views/{$code}.php");

  die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
  if (!$condition) {
    abort($status);
  }

  return true;
}

function base_path($value)
{
  return BASE_PATH . $value;
}

function view($path, $data = [])
{
  extract($data);

  require base_path('views/' . $path);
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = '')
{
  return Session::get('old')['email'] ?? $default;
}
