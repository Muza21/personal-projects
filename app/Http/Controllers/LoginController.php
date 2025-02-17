<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        }

        return redirect()->intended(route('posts.index'))->with('success', 'Logged in successfully.');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login.index');
    }
}
