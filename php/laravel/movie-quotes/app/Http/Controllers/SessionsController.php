<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect(route('random.quote'));
	}
}
