<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	public function booking()
	{
		return $this->belongsTo('App\Booking');
	}

	public function creator()
	{
		return $this->belongsTo('App\User');
	}

	public function communityCenter()
	{
		return $this->belongsTo('App\CommunityCenter');
	}
}
