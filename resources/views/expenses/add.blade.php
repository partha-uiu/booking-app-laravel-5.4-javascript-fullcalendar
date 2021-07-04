@extends('layouts.master')

@section('title', 'Add Expense')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-12 text-md-right text-center">
                    <a href="{{ route('expenses') }}" class="btn btn-outline-primary mb-4">View All Expenses</a>
                </div>
                <div class="col-12">
                    <form action="{{ route('expenses.add') }}" method="post">
                        {{ csrf_field() }}

                        <div id="expenseInputDiv">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class=" form-control datePicker" placeholder="Date" name="date[]">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <select class="form-control mb-4 mt-lg-0" name="category[]">
                                        <option disabled selected>Category</option>
                                        @foreach ($expenseCategories as $expenseCategory)
                                            <option value="{{ $expenseCategory->id }}">{{ $expenseCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group mb-4 mt-lg-0">
                                        <input type="text" placeholder="Amount" class="form-control" name="amount[]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                                <div class="col text-right">
                                    <button type="button" class="btn radius-round background-primary px-0" style="width: 50px;" id="addExpense">
                                        <span class="fa fa-plus color-white"></span>
                                    </button>
                                </div>
                            </div>

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
			$('.datePicker')
				.datepicker({
					format: 'dd MM yyyy',
					todayHighlight: true
				});
			$('#addExpense').click(function () {
				var new_element = $('#expenseInputDiv').clone().insertAfter('Div#expenseInputDiv:last');
				new_element.find('input').not("input[type='hidden']").val("");
				$('.datePicker')
					.datepicker({
						format: 'dd MM yyyy',
						todayHighlight: true
					});
			});
		});
    </script>
@endsection