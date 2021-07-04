<div class="card">
    <div class="card-header" data-toggle="collapse" href="#payment">
        <h5 class="mb-0"><a href="#">Payment Information</a></h5>
    </div>

    <div id="payment" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="text" class="form-control" name="total_amount" id="total_amount" value="{{ old('total_amount', $booking->subtotal_amount) }}">
            </div>
            <div class="form-group">
                <label for="discount">Discount Amount</label>
                <input type="text" id="discount" class="form-control" name="discount" value="{{ old('discount', $booking->discount) }}">
            </div>
        </div>
    </div>
</div>