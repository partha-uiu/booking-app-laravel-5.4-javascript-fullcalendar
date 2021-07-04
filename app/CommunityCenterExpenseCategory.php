<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityCenterExpenseCategory extends Model
{
    protected $table = 'community_center_expense_category';

    public function expenseCategories()
    {
        return $this->belongsToMany('App\ExpenseCategory');
    }

    public function communityCenters()
    {
        return $this->belongsToMany('App\CommunityCenter');
    }

}
