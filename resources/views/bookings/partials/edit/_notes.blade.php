<div class="card">
    <div class="card-header" data-toggle="collapse" href="#notes">
        <h5 class="mb-0"><a href="#">Additional Notes</a></h5>
    </div>

    <div id="notes" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" class="form-control" rows="5" id="comment" name="notes">{{ old('notes', $booking->notes) }}</textarea>
            </div>
        </div>
    </div>
</div>