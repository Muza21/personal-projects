<?php

namespace App\Controllers;

use App\Core\Controller;

class TestController extends Controller
{
    public function index()
    {
        view('home', [
            'logo' => 'hello'
        ]);
    }

    public function contact()
    {
        view('contact');
    }

    public function create()
    {
        dd('here');
    }
}
