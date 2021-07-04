@extends('layouts.master')

@section('title', 'Review Booking')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 mx-md-auto">
                    @include('common.notifications')
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <th>Date</th>
                                <td>{{ $booking['date'] }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ ucfirst($booking['time']) }}</td>
                            </tr>
                            <tr>
                                <th>Event type</th>
                                <td>{{ $eventType->name }}</td>
                            </tr>
                            <tr>
                                <th>No of guests</th>
                                <td>{{ $booking['guest_count'] }}</td>
                            </tr>
                            <tr>
                                <th>Client Name</th>
                                <td>{{ $booking['client_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Client Address</th>
                                <td>{{ $booking['client_address'] }}</td>
                            </tr>
                            <tr>
                                <th>Client Mobile</th>
                                <td>{{ $booking['client_mobile'] }}</td>
                            </tr>
                            <tr>
                                <th>Client Email</th>
                                <td>{{ $booking['client_email'] }}</td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td>{{ $booking['total_amount'] or '0' }} TK</td>
                            </tr>
                            <tr>
                                <th>Discount Amount</th>
                                <td>{{ $booking['discount'] or '0' }} TK</td>
                            </tr>
                            <tr>
                                <th>Advance Paid</th>
                                <td>{{ $booking['advance'] or '0'}} TK</td>
                            </tr>
                            <tr>
                                <th>Due Amount</th>
                                <td>{{ $booking['due_amount'] }} TK</td>
                            </tr>
                            <tr>
                                <th>Additional Note</th>
                                <td>{{ $booking['notes'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 text-center">
                    <a href="{{ route('bookings.save') }}" class="btn btn-primary mt-2">Save</a>
                    <a href="{{ route('bookings.add') }}" class="btn btn-outline-primary mt-2">Edit</a>
                    <a href="{{ route('bookings.cancel') }}" class="btn btn-outline-danger mt-2">Cancel</a>
                </div>
            </div>
        </div>
    </section>
@endsection