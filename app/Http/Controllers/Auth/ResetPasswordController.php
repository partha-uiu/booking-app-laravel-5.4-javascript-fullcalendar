<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
	use ResetsPasswords;

	protected $redirectTo = '/dashboard';

	public function showResetForm(Request $request, $token = null)
	{
		return view('auth.reset-password')->with([
				'token' => $token,
				'email' => $request->email
			]
		);
	}
}
