<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
	public function index($id)
	{
		$booking = Booking::with('payments.user')->find($id);

		return view('payments.index')->with('booking', $booking);
	}

	public function add($id)
	{
		return view('payments.add')->with('id', $id);
	}

	public function store($id, Request $request)
	{
		$this->validate($request, [
			'amount' => 'required'
		]);

		$payment = new Payment();
		$payment->booking_id = $id;
		$payment->received_by = Auth::id();
		$payment->paid_amount = $request->amount;
		$payment->save();

		return redirect()
				->route('bookings.payments', ['id' => $id])
				->with('success', 'Payment has been added');
	}

	public function edit($id, $paymentId)
	{
		$payment = Payment::find($paymentId);

		return view('payments.edit')
					->with('id', $id)
					->with('payment', $payment);
	}

	public function update($id, $paymentId, Request $request)
	{
		$this->validate($request, [
			'amount' => 'required'
		]);

		$payment = Payment::find($paymentId);
		$payment->received_by = Auth::id();
		$payment->paid_amount = $request->amount;
		$payment->save();

		return redirect()
			->route('bookings.payments', ['id' => $id])
			->with('success', 'Payment has been updated');
	}

	public function delete($id, $paymentId)
	{
		Payment::find($paymentId)->delete();

		return redirect()
			->route('bookings.payments', ['id' => $id])
			->with('success', 'Payment has been deleted');
	}
}
