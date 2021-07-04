@extends('layouts.master')

@section('title', 'Edit Expense')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    @include('common.notifications')
                    <form method="post" action="{{ route('expenses.edit', ['id' => $expense->id]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" value="{{ $expense->id }}" name="id">

                        <div class="form-group">
                            <label for="datePicker">Expense Date</label>
                            <input id="datePicker" class="form-control" name="date" type="text" value="{{ old("date", Carbon\Carbon::createFromFormat('Y-m-d', $expense->date)->format('d F Y')) }}">
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="expense_category">
                                <option value="" disabled selected></option>
                                @foreach ($expenseCategories as $expenseCategory)
                                    <option value="{{ old("expense_category", $expenseCategory->id) }}"
                                            @if($expense->expense_category_id == $expenseCategory->id) selected @endif
                                    >
                                        {{ $expenseCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input id="amount" class="form-control" name="amount" type="text" value="{{ old("amount", $expense->amount) }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('expenses') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
		$(document).ready(function () {
			$('#datePicker')
				.datepicker({
					format: 'dd MM yyyy',
					todayHighlight: true
				});
		});
    </script>
@endsection