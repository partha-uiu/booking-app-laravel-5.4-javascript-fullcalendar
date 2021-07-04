<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'event_types';

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function selectedCommunityCenters()
    {
        return $this->belongsToMany('App\CommunityCenter');
    }

}
