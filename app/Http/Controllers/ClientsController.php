<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
	public function index()
	{
		$clients = Auth::user()->communityCenter
							->clients()
							->with('booking.eventType')
							->latest()
							->paginate(10);

		return view('clients.index')->with('clients', $clients);
	}
}
