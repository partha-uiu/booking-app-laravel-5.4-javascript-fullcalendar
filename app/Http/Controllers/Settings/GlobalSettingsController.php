<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalSettingsUpdateRequest;
use Illuminate\Support\Facades\Auth;

class GlobalSettingsController extends Controller
{
	public function globalSettings()
	{
		$communityCenter = Auth::user()->communityCenter;

		return view('settings.global-settings')->with('communityCenter', $communityCenter);
	}

	public function updateGlobalSettings(GlobalSettingsUpdateRequest $request)
	{
		$communityCenter = Auth::user()->communityCenter;

		$communityCenter->name = $request->name;
		$communityCenter->location = $request->location;
		$communityCenter->save();

		return redirect()->back()->with('success', 'Community center details has been updated');
	}

}
