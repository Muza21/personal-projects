<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
	public function store(RegistrationRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		User::create([
			'name'     => $validated['name'],
			'email'    => $validated['email'],
			'password' => bcrypt($validated['password']),
		]);

		return redirect(route('login.index'))->with('success', 'Registration successful! Please login.');
	}
}
