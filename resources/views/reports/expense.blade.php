@extends('layouts.master')

@section('title', 'Expense Report')

@section('content')
    <section class="font-1 pt-2 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="mb-3">
                <form action="{{ route('reports.expense') }}" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon"> From Date</span>
                                <input type="text" class="form-control" id="fromDate" name="from" value="{{ request()->from }}">
                            </div>
                        </div>
                        <div class="col-md-5 mt-4 mt-md-0">
                            <div class="input-group">
                                <span class="input-group-addon"> To Date</span>
                                <input type="text" class="form-control" id="toDate" name="to" value="{{ request()->to }}">
                            </div>
                        </div>
                        <div class="col-md-2 mt-4 mt-md-0">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="mb-4 background-10 p-4 mb-4">
                        <h5 class="mb-0 fw-100">Total Expense:
                       {{ number_format($totalExpense->sum('amount')) }} TK</h5>
                    </div>

                    @if(!$expenses->count())
                        <div class="alert alert-info">
                            No expense found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Logged By</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr class="text-nowrap">
                                        <td class="">{{ Carbon\Carbon::createFromFormat('Y-m-d', $expense->date)->format('d M Y') }}</td>
                                        <td class="">{{ $expense->expenseCategory->name }}</td>
                                        <td class="">{{ $expense->loggedByUser->name }}</td>
                                        <td class="text-right">{{ number_format($expense->amount) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $expenses->appends(request()->input())->links() }}

                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                                {{ $expenses->appends(request()->input())->links() }}
                            </div>
                            <div class="col-12 col-lg-6 text-center text-lg-right">
                                <a href="{{ route('reports.expense.download', request()->input()) }}" class="btn btn-primary">Download report as PDF</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
		$(document).ready(function () {
			$('#fromDate, #toDate')
				.datepicker({
					format: 'dd MM yyyy',
					todayHighlight: true,
					orientation: "bottom"
				});
		});
    </script>
@endsection
