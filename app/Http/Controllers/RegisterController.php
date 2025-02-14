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
        // dd($validated);
        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
        // $user->name = $validated->name;
        // $user->email = $validated->email;
        // $user->password = $validated->password;
        $user->save();
        return redirect('/');
    }
}
