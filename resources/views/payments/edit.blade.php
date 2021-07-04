@extends('layouts.master')

@section('title', 'Edit Payment')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form method="post" action="{{ route('bookings.payments.edit', ['id' => $id, 'paymentId' => $payment->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="amount">Amount Received</label>
                            <input id="amount" class="form-control" name="amount" value="{{ old('amount', $payment->paid_amount) }}" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('bookings.payments', ['id' => $id]) }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection