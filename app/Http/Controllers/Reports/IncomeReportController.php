<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class IncomeReportController extends Controller
{
	public function index(Request $request)
	{
		$q = Auth::user()->communityCenter->bookings()->with('payments')->orderBy('date', 'desc');

		if($request->has('from')) {
			$from = Carbon::createFromFormat('d F Y', $request->from)->format('Y-m-d');
			$q->where('date', '>=', $from);
		}
		if($request->has('to')) {
			$to = Carbon::createFromFormat('d F Y', $request->to)->format('Y-m-d');
			$q->where('date', '<=', $to);
		}

		$bookings = $q->paginate(10);

		$totalIncome = $q->get();

		return view('reports.income')
			->with('bookings', $bookings)
			->with('totalIncome', $totalIncome);
	}

	public function download(Request $request)
	{
		$from = null;
		$to= null;

		$q = Auth::user()->communityCenter->bookings()->with('payments')->orderBy('date', 'desc');

		if($request->has('from')) {
			$from = Carbon::createFromFormat('d F Y', $request->from)->format('Y-m-d');
			$q->where('date', '>=', $from);
		}
		if($request->has('to')) {
			$to = Carbon::createFromFormat('d F Y', $request->to)->format('Y-m-d');
			$q->where('date', '<=', $to);
		}

		$bookings = $q->get();
		$communityCenter = Auth::user()->communityCenter;

		$html = view('reports.income-pdf', [
			'bookings'        => $bookings,
			'communityCenter' => $communityCenter,
			'from'            => $from,
			'to'              => $to
		])->render();

		$html = preg_replace('/>\s+</', '><', $html);

		$pdf = PDF::loadHtml($html);
		$downloadAs = "{$communityCenter->name} - Income report.pdf";

		return $pdf->download($downloadAs);
	}
}
