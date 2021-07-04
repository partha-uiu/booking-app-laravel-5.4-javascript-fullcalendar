<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ExpenseReportController extends Controller
{
	public function index(Request $request)
	{
		$q = Auth::user()->communityCenter->expenses()->with(['expenseCategory', 'loggedByUser'])->orderBy('date', 'desc');

		if($request->has('from')) {
			$from = Carbon::createFromFormat('d F Y', $request->from)->format('Y-m-d');
			$q->where('date', '>=', $from);
		}
		if($request->has('to')) {
			$to = Carbon::createFromFormat('d F Y', $request->to)->format('Y-m-d');
			$q->where('date', '<=', $to);
		}

		$expenses = $q->paginate(10);

		$totalExpense = $q->get();

		return view('reports.expense')
				->with('expenses', $expenses)
				->with('totalExpense', $totalExpense);
	}

	public function download(Request $request)
	{
		$from = null;
		$to= null;

		$q = Auth::user()->communityCenter->expenses()->with(['expenseCategory', 'loggedByUser'])->orderBy('date', 'desc');

		if($request->has('from')) {
			$from = Carbon::createFromFormat('d F Y', $request->from)->format('Y-m-d');
			$q->where('date', '>=', $from);
		}
		if($request->has('to')) {
			$to = Carbon::createFromFormat('d F Y', $request->to)->format('Y-m-d');
			$q->where('date', '<=', $to);
		}

		$expenses = $q->get();
		$communityCenter = Auth::user()->communityCenter;

		$html = view('reports.expense-pdf', [
			'expenses'        => $expenses,
			'communityCenter' => $communityCenter,
			'from'            => $from,
			'to'              => $to
		])->render();

		$html = preg_replace('/>\s+</', '><', $html);

		$pdf = PDF::loadHtml($html);
		$downloadAs = "{$communityCenter->name} - Expense report.pdf";

		return $pdf->download($downloadAs);
	}
}
