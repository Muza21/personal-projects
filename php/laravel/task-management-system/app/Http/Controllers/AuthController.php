<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(AuthenticationRequest $request): RedirectResponse
	{
		$validation = $request->validated();
		if (!auth()->attempt($validation)) {
			throw ValidationException::withMessages([
				'email'=> 'Your provided credentials could not be identified.',
			]);
		}

		return redirect(route('task.index'));
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect(route('login.index'));
	}
}
