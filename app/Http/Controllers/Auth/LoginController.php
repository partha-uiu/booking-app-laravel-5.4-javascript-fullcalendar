<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function loginForm()
	{
		return view('auth.login');
	}

	public function login(LoginRequest $request)
	{
		$userData = [
			'email'    => $request->email,
			'password' => $request->password
		];

		if(Auth::attempt($userData)) {
			return redirect()->route('dashboard');
		} else {
			return redirect()->back()->withInput()->with('error', 'Wrong Email or Password');
		}
	}

	public function logout()
	{
		Auth::logout();

		return redirect()->route('home');
	}
}