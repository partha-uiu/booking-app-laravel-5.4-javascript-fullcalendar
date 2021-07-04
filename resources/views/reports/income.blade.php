@extends('layouts.master')

@section('title', 'Income Report')

@section('content')
    <section class="font-1 pt-2 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="mb-3">
                <form action="{{ route('reports.income') }}" method="get">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">From Date</span>
                                <input type="text" class="form-control" id="fromDate" name="from" value="{{ request()->from }}">
                            </div>
                        </div>
                        <div class="col-md-5 mt-4 mt-md-0">
                            <div class="input-group">
                                <span class="input-group-addon">To Date</span>
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



            <section  class="background-10 p-4 mb-4">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="fw-100 mb-0">Total:
                    {{ number_format($totalIncome->sum('total_amount')) }} TK</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-100 mb-0">Paid: 
                        {{ number_format($totalIncome->sum('paid_amount')) }} TK</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-100 mb-0">Due:
                   {{ number_format($totalIncome->sum('due_amount')) }} TK</h5>
                </div>
            </div>
            </section>
            <div class="row">
                <div class="col-12">
                    @if(!$bookings->count())
                        <div class="alert alert-info">
                            No booking found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Booking</th>
                                    <th class="text-right">Total Amount</th>
                                    <th class="text-right">Paid Amount</th>
                                    <th class="text-right">Due Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="text-nowrap">
                                        <td>
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->date)->format('d M Y') }}
                                            <br>
                                            <small>{{ $booking->duration }}</small>
                                        </td>
                                        <td>
                                            <a href="{{ route('bookings.view', ['id' => $booking->id]) }}">
                                                {{ $booking->eventType->name }}
                                            </a>
                                            <br>
                                            <small>{{ $booking->client->name or '' }}</small>
                                        </td>
                                        <td class="text-right">{{ number_format($booking->total_amount) }}</td>
                                        <td class="text-right">{{ number_format($booking->paid_amount) }}</td>
                                        <td class="text-right">{{ number_format($booking->due_amount) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                                {{ $bookings->appends(request()->input())->links() }}
                            </div>
                            <div class="col-12 col-lg-6 text-center text-lg-right">
                                <a href="{{ route('reports.income.download', request()->input()) }}" class="btn btn-primary">Download report as PDF</a>
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
