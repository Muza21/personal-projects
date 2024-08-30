<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
	public function sendResetLink(ForgotPasswordRequest $request): RedirectResponse
	{
		$validation = $request->validated();
		$data = [
			'email'=> $validation['email'],
			'token'=> Str::random(60),
		];
		Mail::to($data['email'])->locale(App::currentLocale())->send(new ResetPassword($data));
		return redirect(route('reset.notice'));
	}

	public function showResetForm(Request $requset, $token): View
	{
		return view('reset-password', ['token' => $token, 'email'=>$requset->email]);
	}

	public function update(UpdatePasswordRequest $request)
	{
		$validation = $request->validated();
		User::where('email', $validation['email'])->update([
			'password' => bcrypt($validation['password']),
		]);
		return view('reseted');
	}
}
