<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $table = 'expense_categories';

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

    public static function getCategory()
    {
        $expenseCategory = ExpenseCategory::select('id', 'name')->get();

        return $expenseCategory;
    }

    public function selectedCommunityCenters()
    {
        return $this->belongsToMany('App\CommunityCenter');
    }

}
