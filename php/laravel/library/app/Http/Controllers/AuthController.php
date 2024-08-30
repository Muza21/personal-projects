<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		if (!auth()->attempt($validated)) {
			throw ValidationException::withMessages([
				'email'=> 'Your provided credentials could not be identified!',
			]);
		}

		return redirect(route('books.index'));
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect(route('login.view'));
	}
}
