@extends('layouts.print')

@section('content')
    <div class="community-center">
        <div class="name">{{ $communityCenter->name }}</div>
        <div class="location">{{ $communityCenter->location }}</div>
        <div class="page-title">
            @if(is_null($from) && is_null($to))
                Showing all income report
            @else
                Showing income report
                from
                @if(!is_null($from))
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $from)->format('d M Y') }}
                @else
                    -
                @endif
                to
                @if(!is_null($to))
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $to)->format('d M Y') }}
                @else
                    -
                @endif
            @endif
        </div>
    </div>


    <table class="summary">
        <tbody>
            <tr class="text-center">
                <td>Total Amount: {{ number_format($bookings->sum('total_amount')) }} TK</td>
                <td>Paid Amount: {{ number_format($bookings->sum('paid_amount')) }} TK</td>
                <td>Due Amount: {{ number_format($bookings->sum('due_amount')) }} TK</td>
            </tr>
        </tbody>
    </table>

    @if(!$bookings->count())
        <div class="alert alert-danger">
            No booking found
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Booking</th>
                    <th>Client</th>
                    <th class="text-right">Total Amount</th>
                    <th class="text-right">Paid Amount</th>
                    <th class="text-right">Due Amount</th>
                </tr>
            </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="text-nowrap">
                            {{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->date)->format('d M Y') }}
                            <br>
                            <small>{{ $booking->duration }}</small>
                        </td>
                        <td>
                            {{ $booking->eventType->name }}
                        </td>
                        <td>
                            {{ $booking->client->name or '' }}
                            <br>
                            <small>{{ $booking->client->mobile or '' }}</small>
                        </td>
                        <td class="text-right">{{ number_format($booking->total_amount) }}</td>
                        <td class="text-right">{{ number_format($booking->paid_amount) }}</td>
                        <td class="text-right">{{ number_format($booking->due_amount) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="print-info">
        This report was downloaded by {{ auth()->user()->name }} ({{ auth()->user()->email }}) at {{ \Carbon\Carbon::now()->format('d M y H:i:s A' ) }}
        <br>
        Powered By <a href="{{ url('home') }}">{{ config('app.name') }}</a>
    </div>
@endsection
