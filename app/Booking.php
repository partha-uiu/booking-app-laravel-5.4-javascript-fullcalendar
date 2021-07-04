<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $guarded = ['id', 'logged_by'];

	public function eventType()
	{
		return $this->belongsTo('App\EventType');
	}

	public function client()
	{
		return $this->hasOne('App\Client', 'booking_id');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}

	protected $appends = ['paid_amount', 'due_amount'];

	public function getPaidAmountAttribute()
	{
		return $this->payments->sum('paid_amount');
	}

	public function getDueAmountAttribute()
	{
		if(isset($this->attributes['total_amount'])) {
			return $this->attributes['total_amount'] - $this->payments->sum('paid_amount');
		}

		return null;
	}
}
