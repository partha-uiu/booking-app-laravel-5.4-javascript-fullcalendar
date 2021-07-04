@extends('layouts.master')

@section('title', 'View Booking')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 text-center">
                    <a href="{{ route('bookings.payments', ['id' => $booking->id]) }}" class="btn btn-outline-primary mt-2">View all payments</a>
                    <a href="{{ route('bookings.payments.add', ['id' => $booking->id]) }}" class="btn btn-outline-primary mt-2">Add new payment</a>
                    <a href="{{ route('bookings.edit', ['id' => $booking->id]) }}" class="btn btn-outline-primary mt-2">Edit</a>
                    <a href="{{ route('bookings.delete', ['id' => $booking->id]) }}" onclick="return confirmDelete();" class="btn btn-outline-danger mt-2">Delete</a>
                </div>
                <div class="col-12 col-md-8 mx-md-auto">
                    @include('common.notifications')
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <th>Date</th>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $booking->date)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>{{ ucfirst($booking->duration) }}</td>
                            </tr>
                            <tr>
                                <th>Event type</th>
                                <td>{{ $booking->eventType->name }}</td>
                            </tr>
                            <tr>
                                <th>No of guests</th>
                                <td>{{ $booking->guest_count }}</td>
                            </tr>
                            <tr>
                                <th>Client Name</th>
                                <td>{{ $booking->client->name or '' }}</td>
                            </tr>
                            <tr>
                                <th>Client Address</th>
                                <td>{{ $booking->client->address or '' }}</td>
                            </tr>
                            <tr>
                                <th>Client Mobile</th>
                                <td>{{ $booking->client->mobile or '' }}</td>
                            </tr>
                            <tr>
                                <th>Client Email</th>
                                <td>{{ $booking->client->email or '' }}</td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td>{{ number_format($booking->subtotal_amount) }} TK</td>
                            </tr>
                            <tr>
                                <th>Discount Amount</th>
                                <td>{{ number_format($booking->discount) }} TK</td>
                            </tr>
                            <tr class="text-nowrap">
                                <th>Amount needs to be paid</th>
                                <td>{{ number_format($booking->total_amount) }} TK</td>
                            </tr>
                            <tr>
                                <th>Client Paid</th>
                                <td>{{ number_format($booking->paid_amount) }} TK</td>
                            </tr>
                            <tr>
                                <th>Due Amount</th>
                                <td>{{ number_format($booking->due_amount) }} TK</td>
                            </tr>
                            <tr>
                                <th>Additional Note</th>
                                <td>{{ $booking->notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection