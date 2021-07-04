@extends('layouts.master')

@section('title', 'Payments')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row mb-4 align-items-center">
                <div class="col-md-7 mb-3 text-center text-md-left">
                    <h5 class="fw-100">Total {{ $booking->payments->count() }} payments found</h5>
                </div>
                <div class="col-md-5 text-md-right text-center">
                    <a href="{{ route('bookings.view', ['id' => $booking->id]) }}" class="btn btn-outline-primary ">Go Back</a>

                    <a href="{{ route('bookings.payments.add', ['id' => $booking->id]) }}" class="btn btn-primary ">Add new payment</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$booking->payments->count())
                        <div class="alert alert-info">
                            No payment found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Received By</th>
                                    <th>Received On</th>
                                    <th class="text-right">Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking->payments as $payment)
                                    <tr class="text-nowrap">
                                        <td>{{ $payment->user->name or '-' }}</td>
                                        <td>{{ $payment->created_at->format('d M Y') }}</td>
                                        <td class="text-right">{{ number_format($payment->paid_amount) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-xs" href="{{ route('bookings.payments.edit', ['id' => $booking->id, 'paymentId' => $payment->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="btn btn-xs" href="{{ route('bookings.payments.delete', ['id' => $booking->id, 'paymentId' => $payment->id]) }}" onclick="return confirmDelete();"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="text-right">
                                        {{ number_format($booking->payments->sum('paid_amount')) }}
                                    </th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection