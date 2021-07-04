@extends('layouts.master')

@section('title', 'All Expenses')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-lg-9 text-center text-lg-left">
                    <h5 class="fw-100">Total {{ $expenses->total() }} expenses found</h5>
                </div>
                <div class="col-12 col-lg-3 text-center text-lg-right">
                    <a href="{{ route('expenses.add') }}" class="btn btn-primary">Add new expense</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$expenses->count())
                        <div class="alert alert-info">
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr class="text-nowrap">
                                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d',$expense->date)->format('d M Y') }}</td>
                                        <td>{{ $expense->expenseCategory->name }}</td>
                                        <td>{{ $expense->loggedByUser->name }}</td>
                                        <td class="text-right">{{ number_format($expense->amount) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-xs" href="{{ route('expenses.edit', ['id' => $expense->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="btn btn-xs" href="{{ route('expenses.delete', ['id' => $expense->id]) }}" onclick="return confirmDelete();"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $expenses->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection