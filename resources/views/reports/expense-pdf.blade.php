@extends('layouts.print')

@section('content')
    <div class="community-center">
        <div class="name">{{ $communityCenter->name }}</div>
        <div class="location">{{ $communityCenter->location }}</div>
        <div class="page-title">
            @if(is_null($from) && is_null($to))
                Showing all expense report
            @else
                Showing expense report
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
                <td>Total Expense: {{ number_format($expenses->sum('amount')) }} TK</td>
            </tr>
        </tbody>
    </table>

    @if(!$expenses->count())
        <div class="alert alert-danger">
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
    @endif

    <div class="print-info">
        This report was downloaded by {{ auth()->user()->name }} ({{ auth()->user()->email }}) at {{ \Carbon\Carbon::now()->format('d M y H:i:s A' ) }}
        <br>
        Powered By <a href="{{ url('home') }}">{{ config('app.name') }}</a>
    </div>
@endsection
