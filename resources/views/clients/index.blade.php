@extends('layouts.master')

@section('title', 'Clients List')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h5 class="fw-100">Total {{ $clients->total() }} clients found</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    @if(!$clients->count())
                        <div class="alert alert-info">
                            No client found
                        </div>
                    @else
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Event</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-right">Paid</th>
                                    <th class="text-right">Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="text-nowrap">
                                            {{ $client->name }}
                                            <br>
                                            <small>{{ $client->email }}</small>
                                        </td>
                                        <td class="text-nowrap"><a href="tel:{{ $client->mobile }}">{{ $client->mobile }}</a></td>
                                        <td><a href="{{ route('bookings.view', $client->booking->id) }}">{{ $client->booking->eventType->name }}</a></td>
                                        <td class="text-right">{{ number_format($client->booking->total_amount) }}</td>
                                        <td class="text-right">{{ number_format($client->booking->paid_amount) }}</td>
                                        <td class="text-right">{{ number_format($client->booking->due_amount) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $clients->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection