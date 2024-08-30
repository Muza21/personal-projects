<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
	public function verifyEmail(Request $request): RedirectResponse
	{
        $user = User::find($request->id);

        if($request->token === sha1($user->email)){
            if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
            else
            {
                return redirect(route('login.view'));
            }
        }

		return redirect(route('email.confirmed'));
	}
}
