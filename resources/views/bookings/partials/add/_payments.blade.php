<div class="card">
    <div class="card-header" data-toggle="collapse" href="#payment">
        <h5 class="mb-0"><a href="#">Payment Information</a></h5>
    </div>

    <div id="payment" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="text" class="form-control" name="total_amount" id="total_amount" value="{{ old('total_amount', session('booking')['total_amount']) }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="discount">Discount Amount</label>
                    <input type="text" id="discount" class="form-control" name="discount" value="{{ old('discount', session('booking')['discount']) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="advance">Advance Amount</label>
                    <input type="text" class="form-control advance" name="advance" id="advance" value="{{ old('advance', session('booking')['advance']) }}">
                </div>
            </div>
            <div class="form-group">
                <label for="due_amount">Due Amount</label>
                <input type="text" id="due_amount" class="form-control" name="due_amount" value="{{ old('due_amount', session('booking')['due_amount']) }}" readonly>
            </div>
        </div>
    </div>
</div>