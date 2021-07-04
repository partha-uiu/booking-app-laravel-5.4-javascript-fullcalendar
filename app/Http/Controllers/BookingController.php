<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Http\Requests\ReviewBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Mail\EventBooked;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Payment;
use App\Booking;
use App\CommunityCenter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function add()
    {
        $eventTypes = Auth::user()->communityCenter->selectedEventTypes;

		$bookings = [];
		$rawBookings = Auth::user()
							->communityCenter
							->bookings()
							->with('eventType')
							->get();


		foreach($rawBookings as $rawBooking) {
			$bookings[] = [
				'start'     => $rawBooking->date,
				'title'     => $rawBooking->eventType->name,
				'className' => "{$rawBooking->duration}-cell",
				'url'		=> route('bookings.view', ['id' => $rawBooking->id])
			];
		}

        return view('bookings.add')
					->with('eventTypes', $eventTypes)
					->with('bookings', $bookings);
    }

    public function saveInSession(ReviewBookingRequest $request)
    {
    	session()->put('booking', $request->except('_token'));

		return redirect()->route('bookings.review');
    }

    public function review() {
		$booking = session('booking');

		if(!$booking) return redirect()->route('bookings.add')->with('error', 'No booking found');

		$eventType = EventType::find($booking['event_type']);

		return view('bookings.review')->with('booking', $booking)->with('eventType', $eventType);
	}

	public function cancel()
	{
		session()->forget('booking');

		return redirect()->route('bookings.add')->with('success', 'The booking has been cancelled');
	}

    public function store()
    {
    	if(!session('booking')) return redirect()->route('bookings.add')->with('error', 'No booking found');

		$session = collect(session('booking'));

		// booking
		$booking = new Booking;
		$booking->date = Carbon::createFromFormat('j F Y', $session->get('date'))->format('Y-m-d');
		$booking->duration = $session->get('time');
		$booking->community_center_id = Auth::user()->community_center_id;
		$booking->event_type_id = $session->get('event_type');
		$booking->guest_count = $session->get('guest_count');
		$booking->notes = $session->get('notes');
		$booking->subtotal_amount = $session->get('total_amount');
		$booking->discount = $session->get('discount') ? $session->get('discount') : 0;
		$booking->total_amount = $session->get('total_amount') - $booking->discount;
		$booking->logged_by = Auth::id();
		$booking->save();

		// client
		$client = new Client;
		$client->booking_id = $booking->id;
		$client->community_center_id = Auth::user()->community_center_id;
		$client->creator_id = Auth::id();
		$client->name = $session->get('client_name');
		$client->mobile = $session->get('client_mobile');
		$client->address = $session->get('client_address');
		$client->email = $session->get('client_email');
		$client->save();

        // payment
        if ($session->get('advance')) {
            $payment = new Payment;
            $payment->booking_id = $booking->id;
            $payment->received_by = Auth::id();
            $payment->paid_amount = $session->get('advance') ? $session->get('advance') : 0;
            $payment->save();
        }

		if($client->email) {
			Mail::to($client->email)->send(new EventBooked($booking, Auth::user()->communityCenter, $client));
		}
		session()->forget('booking');

        return redirect()->route('bookings')->with('success', 'Event has been booked');
    }

	public function delete($id)
	{
		Booking::find($id)->delete();

		return redirect()->route('dashboard')->with('success', 'Booking has been deleted');
	}

    public function view($id)
    {
        $booking = Booking::with('payments', 'eventType', 'client')->find($id);

        return view('bookings.view')->with('booking', $booking);
    }

	public function edit($id)
	{
		$booking = Booking::with('payments', 'eventType', 'client')->find($id);
		$eventTypes = CommunityCenter::with('selectedEventTypes')->find(Auth::user()->community_center_id)->selectedEventTypes;

		$bookings = [];
		$rawBookings = Auth::user()
			->communityCenter
			->bookings()
			->with('eventType')
			->get();


		foreach($rawBookings as $rawBooking) {
			$bookings[] = [
				'start'     => $rawBooking->date,
				'title'     => $rawBooking->eventType->name,
				'className' => "{$rawBooking->duration}-cell",
				'url'		=> route('bookings.view', ['id' => $rawBooking->id])
			];
		}

		return view('bookings.edit')
				->with('booking', $booking)
				->with('eventTypes', $eventTypes)
				->with('bookings', $bookings);
	}

	public function update($id, UpdateBookingRequest $request) {

    	$booking = Booking::with(['client', 'payments'])->find($id);

    	// client
		$client = $booking->client;
		$client->name = $request->client_name;
		$client->mobile = $request->client_mobile;
		$client->address = $request->client_address;
		$client->email = $request->client_email;
		$client->save();

		// booking
		$booking->date = Carbon::createFromFormat('d F Y', $request->date)->format('Y-m-d');
		$booking->duration = $request->time;
		$booking->event_type_id = $request->event_type;
		$booking->guest_count = $request->guest_count;
		$booking->notes = $request->notes;
		$booking->subtotal_amount = $request->total_amount;
		$booking->discount = $request->get('discount', 0);
		$booking->total_amount = $request->total_amount - $request->get('discount', 0);
		$booking->save();

		return redirect()
				->route('bookings.view', ['id' => $booking->id])
				->with('success', 'Booking has been updated');
	}
}
