<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Illuminate\Support\Facades\Auth;
use App\Expense;
use Carbon\Carbon;

class ExpenseController extends Controller
{
	public function index()
	{
		$expenses = Auth::user()->communityCenter->expenses()->with(['expenseCategory', 'loggedByUser'])->orderBy('date', 'desc')->paginate(10);

		return view('expenses.index')->with('expenses', $expenses);
	}

	public function add()
	{
		$expenseCategories = Auth::user()->communityCenter->selectedExpenseCategories;

		return view('expenses.add')->with('expenseCategories', $expenseCategories);
	}

	public function store(AddExpenseRequest $request)
	{
		$count = count($request->date);

		$expenseData = [];
		for($i = 0; $i < $count; $i++) {
			$expenseData[$i]['date'] = $date = Carbon::createFromFormat('d F Y', $request->date[$i])->format('Y-m-d');
			$expenseData[$i]['expense_category_id'] = $request->category[$i];
			$expenseData[$i]['amount'] = $request->amount[$i];
			$expenseData[$i]['logged_by'] = Auth::id();
			$expenseData[$i]['community_center_id'] = Auth::user()->community_center_id;
			$expenseData[$i]['created_at'] = Carbon::now();
			$expenseData[$i]['updated_at'] = Carbon::now();
		}

		Expense::insert($expenseData);

		return redirect()->back()->with('success', 'Expenses has been added');
	}

	public function edit($id)
	{
		$expenseCategories = Auth::user()->communityCenter->selectedExpenseCategories;
		$expense = Expense::with('expenseCategory')->find($id);

		return view('expenses.edit')
			->with('expenseCategories', $expenseCategories)
			->with('expense', $expense);
	}

	public function update($id, UpdateExpenseRequest $request)
	{
		$date = Carbon::createFromFormat('d F Y', $request->date)->format('Y-m-d');

		$expense = Expense::find($id);
		$expense->date = $date;
		$expense->expense_category_id = $request->expense_category;
		$expense->amount = $request->amount;
		$expense->logged_by = Auth::id();
		$expense->save();

		return redirect()->route('expenses')->with('success', 'Expense has been updated');
	}

	public function delete($id)
	{
		Expense::find($id)->delete();

		return redirect()->back()->with('success', 'Expense has been deleted!');
	}

}
