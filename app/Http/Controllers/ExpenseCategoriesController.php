<?php

namespace App\Http\Controllers;

use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoriesController extends Controller
{
	public function index()
	{
		$expenseCategories = Auth::user()->communityCenter->selectedExpenseCategories;

		return view('expense-categories.index')->with('expenseCategories', $expenseCategories);
	}

	public function select()
	{
		$expenseCategories = ExpenseCategory::get();
		$selectedExpenseCategoryIds = Auth::user()->communityCenter
											->selectedExpenseCategories
											->pluck('id')
											->toArray();

		return view('expense-categories.select')
			->with('expenseCategories', $expenseCategories)
			->with('selectedExpenseCategoryIds', $selectedExpenseCategoryIds);
	}

	public function saveSelected(Request $request)
	{
		Auth::user()->communityCenter->selectedExpenseCategories()->sync($request->expense_categories);

		return redirect()->route('expenseCategories')->with('success', 'Expense categories has been updated');
	}

	public function add()
	{
		return view('expense-categories.add');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:expense_categories,name'
		]);

		$category = new ExpenseCategory();
		$category->name = $request->name;
		$category->save();

		Auth::user()->communityCenter->selectedExpenseCategories()->attach($category->id);

		return redirect()->route('expenseCategories')->with('success', 'Expense category has been added and selected');
	}

}
