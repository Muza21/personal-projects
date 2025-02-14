<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request) {}

    public function show(Request $request)
    {
        return view('posts.show');
    }

    public function edit(Request $request)
    {
        return view('posts.edit');
    }

    public function update(Request $request) {}

    public function destroy(Request $request) {}
}
