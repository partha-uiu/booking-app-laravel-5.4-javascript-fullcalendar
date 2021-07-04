<div class="card">
    <div class="card-header" data-toggle="collapse" href="#pick-date">
        <h5 class="mb-0"><a href="#">Pick a date</a></h5>
    </div>

    <div id="pick-date" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <input type="hidden" name="date" id="date" value="{{ old('date', session('booking')['date']) }}"/>
                    <div id="calendarBooking"></div>
                </div>
            </div>
        </div>
    </div>
</div>