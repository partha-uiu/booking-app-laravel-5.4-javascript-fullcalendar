<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordSettingsUpdateRequest;
use App\Http\Requests\ProfileSettingsUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonalSettingsController extends Controller
{
	public function personalSettings()
	{
		$user = Auth::user();

		return view('settings.personal-settings')->with('user', $user);
	}

	public function updateProfileSettings(ProfileSettingsUpdateRequest $request)
	{
		$user = Auth::user();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		return redirect()->back()->with('success', 'Profile has been updated');
	}

	public function updatePasswordSettings(PasswordSettingsUpdateRequest $request)
	{
		if(!Hash::check($request->old_password, Auth::user()->password)) {
			return redirect()->back()->with('error', 'Old password does not match');
		}

		$user = Auth::user();
		$user->password = bcrypt($request->new_password);
		$user->save();

		return redirect()->route('settings.personal')->with('success', 'Password has been updated');

	}

}
