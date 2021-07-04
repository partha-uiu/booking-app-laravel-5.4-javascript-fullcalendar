<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = ['logged_by', 'community_center_id'];

    public function expenseCategory()
    {
        return $this->belongsTo('App\ExpenseCategory');
    }

    public function communityCenter()
    {
        return $this->belongsTo('App\CommunityCenter');
    }

	public function loggedByUser()
	{
		return $this->belongsTo('App\User', 'logged_by');
	}

}
