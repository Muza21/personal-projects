<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = new User($validated);
        $user->save();
        return redirect('/');
    }
}
