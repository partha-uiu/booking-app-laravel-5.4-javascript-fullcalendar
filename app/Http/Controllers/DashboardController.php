<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index(Request $request)
	{
		$currentDate = Carbon::now()->format("Y-m-d");

		$q = Booking::with('payments', 'eventType', 'client')
			->where('community_center_id', Auth::user()->community_center_id)
			->orderBy('date', 'asc');

		if($request->has('upcoming')) {
			$q->where('date', '>=', $currentDate);
		} else if($request->has('previous')) {
			$q->where('date', '<', $currentDate)
				->orderBy('date', 'asc');
		} else {
			$q->where('date', '>=', $currentDate); // default is upcoming
		}

		if($request->has('q')) {
			$searchText = $request->q;
			$q->where(function($query) use ($currentDate, $searchText) {
				$query->where('date', 'like', '%' . $searchText . '%');
				$query->orWhere('duration', 'like', '%' . $searchText . '%');
				$query->orWhereHas('eventType', function($query) use ($searchText) {
					$query->where('name', 'like', '%' . $searchText . '%');
				});
				$query->orWhereHas('client', function($query) use ($searchText) {
					$query->where('name', 'like', '%' . $searchText . '%');
				});
			});
		}

		$upcomingSelected = true;
		if($request->has('previous')) {
			$upcomingSelected = false;
		}

		$bookings = $q->paginate(10);



		$bookingDates = [];

		$rawBookings = Auth::user()
			->communityCenter
			->bookings()
			->with('eventType')
			->get();


		foreach($rawBookings as $rawBooking) {
			$bookingDates[] = [
				'start'     => $rawBooking->date,
				'title'     => $rawBooking->eventType->name,
				'className' => "{$rawBooking->duration}-cell",
				'url'		=> route('bookings.view', ['id' => $rawBooking->id])
			];
		}


		return view('dashboard.index')
			->with('bookings', $bookings)
			->with('upcomingSelected', $upcomingSelected)
			->with('bookingDates', $bookingDates);
	}
}