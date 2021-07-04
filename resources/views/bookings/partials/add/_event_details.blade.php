<div class="card">
    <div class="card-header" data-toggle="collapse" href="#eventDetails">
        <h5 class="mb-0"><a href="#">Enter Event Details</a></h5>
    </div>

    <div id="eventDetails" class="collapse show" data-parent="#bookings-accordion">
        <div class="card-body">
            <div class="form-group">
                <label for="time">Time</label>
                <select class="form-control" name="time" id="time">
                    <option value="" disabled selected></option>
                    @foreach(['day', 'night', 'fullday'] as $time )
                        <option
                                value="{{ $time }}"
                                @if(old('time', session('booking')['time']) == $time) selected @endif
                        >
                            {{ ucfirst($time) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="event_type">Event Type</label>
                <select class="form-control" name="event_type" id="event_type">
                    <option value="" disabled selected></option>
                    @foreach($eventTypes as $eventType )
                        <option
                            value="{{$eventType->id}}"
                            @if(old('event_type', session('booking')['event_type'])==$eventType->id) selected @endif
                        >
                            {{$eventType->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="guest_count">No. of guests</label>
                <input type="text" class="form-control" name="guest_count" id="guest_count" value="{{ old('guest_count', session('booking')['guest_count']) }}">
            </div>
        </div>
    </div>
</div>