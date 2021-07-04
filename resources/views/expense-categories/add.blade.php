@extends('layouts.master')

@section('title', 'Add Expense Category')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    @include('common.notifications')
                    <form method="post" action="{{ route('expenseCategories.add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name of the expense category</label>
                            <input id="name" class="form-control" name="name" value="{{ old('name') }}" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('expenseCategories') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection