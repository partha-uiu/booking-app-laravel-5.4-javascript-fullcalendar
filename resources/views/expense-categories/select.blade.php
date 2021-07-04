@extends('layouts.master')

@section('title', 'Select Expense Categories')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form method="post" action="{{ route('expenseCategories.select') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            @foreach($expenseCategories as $expenseCategory)
                                <div class="zinput zcheckbox">
                                    <input id="category-{{ $expenseCategory->id }}"
                                           name="expense_categories[]"
                                           type="checkbox"
                                           value="{{ $expenseCategory->id }}"
                                           @if(in_array($expenseCategory->id, $selectedExpenseCategoryIds)) checked @endif
                                    >
                                    <label for="category-{{ $expenseCategory->id }}">{{ $expenseCategory->name }}</label>
                                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            @if($expenseCategories->count())
                                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                            @endif
                            <a href="{{ route('expenseCategories.add') }}" class="btn btn-outline-primary mt-3">My expense category is not listed!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection