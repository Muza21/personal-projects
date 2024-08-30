<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$this->authenticate($request);
		return redirect(route('dashboard.view'));
	}

	public function logout(Request $request): RedirectResponse
	{
		auth()->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect(route('login.view'));
	}

	public function authenticate($request)
	{
		$validation = $request->validated();
		$getEmailOrUsername = filter_var($validation['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (auth()->attempt([$getEmailOrUsername => $validation['username'], 'password' => $validation['password']], isset($validation['remember'])))
		{
			if (!User::where($getEmailOrUsername, $validation['username'])->first()->email_verified_at)
			{
				auth()->logout();
				throw ValidationException::withMessages([
					'username' => __('validation.account_not_verified'),
				]);
			}
		}
		else
		{
			throw ValidationException::withMessages([
				'password' => __('validation.password_did_not_match'),
			]);
		}
	}
}
