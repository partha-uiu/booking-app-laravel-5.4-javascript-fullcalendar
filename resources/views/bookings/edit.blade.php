@extends('layouts.master')

@section('title', 'Edit Booking')

@section('content')
    <section class="font-1 pt-4">
        <div class="container">
            <div class="row">
				<div class="col-lg-8 mx-auto">
            		@include('common.notifications')
                    <form method="post" action="{{route('bookings.edit', ['id' => $booking->id])}}">
                        {{ csrf_field() }}

                        <div id="bookings-accordion">
                            @include('bookings.partials.edit._date')
                            @include('bookings.partials.edit._event_details')
                            @include('bookings.partials.edit._client_details')
                            @include('bookings.partials.edit._payments')
                            @include('bookings.partials.edit._notes')
                        </div>

                        <div class="text-center mt-5">

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('bookings.payments', ['id' => $booking->id]) }}" class="btn btn-outline-primary">Add New Payment</a>
                            <a href="{{ route('bookings.view', ['id' => $booking->id]) }}" class="btn btn-outline-primary">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
	<script>
		$(document).ready(function () {
			$('#calendarBooking').fullCalendar({
				dayClick: function (date, jsEvent, view) {
					// add fc-selected class that has the css
					$(".fc-selected").removeClass("fc-selected");
					$(this).addClass("fc-selected");

					// update the hidden input field
					$("#date").val(date.format('D MMMM YYYY'));
				},
				height: "auto",
				header: {
					left: 'title',
					center: '',
					right: 'today prev,next'
				},
				events: {!! json_encode($bookings) !!},
				dayRender: function (date, cell) {
					// if validation fails, set the selected date in the calender
					if (date.format('D MMMM YYYY') === $("#date").val()) {
						cell.addClass("fc-selected");
					}
				}
			});

			// Due Calculation
			$(document).on('change', '#discount, #total_amount, #advance', function () {
				calculateDueAmount();
			});

			function calculateDueAmount() {
				var total = $('#total_amount').val() || 0;
				var discount = $('#discount').val() || 0;
				var advanced = $('#advance').val() || 0;
				var dueAmount = total - discount - advanced;
				$('#due_amount').val(dueAmount);
			}
		});
	</script>
@endsection