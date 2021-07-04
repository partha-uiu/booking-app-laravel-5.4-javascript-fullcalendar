@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <section class="font-1 pt-4">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div id="calendarDashboard"></div>
                </div>
                <div class="col-md-12">
                    <h4 class="mt-4 fw-100" id="booking-list">Booking List</h4>
                    <form action="{{ route('dashboard') }}" method="get">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" value="{{ request()->q }}" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col text-center text-lg-right mt-3 mt-lg-0">
                                <div class="form-group">
                                    <button name="upcoming" class="btn btn-primary @if(!$upcomingSelected) {{ 'btn-outline-primary' }} @endif" value="true">Upcoming</button>
                                    <button name="previous" class="btn btn-primary @if($upcomingSelected) {{ 'btn-outline-primary' }} @endif" value="true">Previous</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @if(!$bookings->count())
                        <div class="alert alert-info">
                            No booking found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Event</th>
                                    <th class="text-right">Total Amount</th>
                                    <th class="text-right">Paid Amount</th>
                                    <th class="text-right">Due Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="text-nowrap">
                                        <td>
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->date)->format('d M \'y')}}
                                            <br/>
                                            <small>{{ $booking->duration }}</small>
                                        </td>
                                        <td>
                                            <a href="{{ route('bookings.view', ['id' => $booking->id ]) }}">{{ $booking->eventType->name }}</a>
                                            <br/>
                                            <small>{{ $booking->client->name or '' }}</small>
                                        </td>
                                        <td class="text-right">{{ number_format($booking->total_amount) }}</td>
                                        <td class="text-right">{{ number_format($booking->paid_amount) }}</td>
                                        <td class="text-right">{{ number_format($booking->due_amount) }}</td>
                                        <td class="text-center">
                                            <div class="dropdown ">
                                                <button class="btn btn-xs btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Select action
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('bookings.payments.add', ['id' => $booking->id ]) }}">Add new payment</a>
                                                    <a class="dropdown-item" href="{{ route('bookings.payments', ['id' => $booking->id ]) }}">View all payments</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('bookings.edit', ['id' => $booking->id ]) }}">Edit booking</a>
                                                    <a class="dropdown-item text-danger" href="{{ route('bookings.delete', ['id' => $booking->id ]) }}" onclick="return confirmDelete();">Delete booking</a>
                                                </div>
                                            </div>
                                            {{--<div class="btn-group">--}}
                                                {{--<a class="btn btn-xs" ><i class="fa fa-dollar"></i> </a>--}}
                                                {{--<a class="btn btn-xs" ><i class="fa fa-pencil"></i> Edit</a>--}}
                                                {{--<a class="btn btn-xs" ><i class="fa fa-trash"></i> Delete</a>--}}
                                            {{--</div>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $bookings->appends(request()->input())->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: .8rem 1rem;
        }
    </style>
@endsection
@section('scripts')
    <script>
		$(document).ready(function () {
			var upcoming = "{{ request()->query('upcoming') }}";
			var previous = "{{ request()->query('previous') }}";

			if (upcoming || previous) {
				console.log("scroll to the booking list");
				// todo: scroll to the booking list
			}

			$('#calendarDashboard').fullCalendar({
				height: "auto",
				header: {
					left: 'title',
					center: '',
					right: 'today prev,next'
				},
				events: {!! json_encode($bookingDates) !!}
			});
		});
    </script>
@endsection