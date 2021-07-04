<div class="card">
    <div class="card-header" data-toggle="collapse" href="#client">
        <h5 class="mb-0"><a href="#">Enter Client Details</a></h5>
    </div>

    <div id="client" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" class="form-control" name="client_name" id="client_name" value="{{ old('client_name', $booking->client->name) }}">
            </div>
            <div class="form-group">
                <label for="client_mobile">Client Mobile No</label>
                <input type="text" class="form-control" name="client_mobile" id="client_mobile" value="{{ old('client_mobile', $booking->client->mobile) }}">
            </div>
            <div class="form-group">
                <label for="client_email">Client Email Address</label>
                <input type="text" class="form-control" name="client_email" id="client_email" value="{{ old('client_email', $booking->client->email) }}">
            </div>
            <div class="form-group">
                <label for="client_address">Client Address</label>
                <input type="text" class="form-control" name="client_address" id="client_address" value="{{ old('client_address', $booking->client->address) }}">
            </div>
        </div>
    </div>
</div>