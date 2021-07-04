<?php

namespace App\Mail;

use App\Booking;
use App\Client;
use App\CommunityCenter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class EventBooked extends Mailable
{
	use Queueable, SerializesModels;

	public $booking;
	public $communityCenter;
	public $client;

	public function __construct(Booking $booking, CommunityCenter $communityCenter, Client $client)
	{
		$this->booking = $booking;
		$this->communityCenter = $communityCenter;
		$this->client = $client;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this
			->from(config('mail.from.address'), $this->communityCenter->name)
			->subject("Congratulations, we have booked your event")
			->markdown('emails.event-booked');
	}
}
