<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityCenter extends Model
{
    protected $table = 'community_centers';
    protected $guarded = ['name', 'location'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

	public function clients()
	{
		return $this->hasMany('App\Client');
	}

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

	public function bookings()
	{
		return $this->hasMany('App\Booking');
	}

    public function selectedEventTypes()
    {
        return $this->belongsToMany('App\EventType')->withTimestamps();
    }

    public function selectedExpenseCategories()
    {
        return $this->belongsToMany('App\ExpenseCategory')->withTimestamps();
    }

}
