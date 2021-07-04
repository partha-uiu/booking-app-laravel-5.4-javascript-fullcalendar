@extends('layouts.master')

@section('title', 'Expense Categories')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-lg-8 text-center text-lg-left">
                    <h5 class="fw-100">Total {{ $expenseCategories->count() }} expense categories selected</h5>
                </div>
                <div class="col-12 col-lg-4 text-center text-lg-right">
                    <a href="{{ route('expenseCategories.select') }}" class="btn btn-primary">Select more expense categories</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$expenseCategories->count())
                        <div class="alert alert-info">
                            No expense category is selected yet
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenseCategories as $expenseCategory)
                                    <tr>
                                        <td>{{ $expenseCategory->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection