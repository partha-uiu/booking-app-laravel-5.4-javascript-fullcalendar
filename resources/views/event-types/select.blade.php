@extends('layouts.master')

@section('title', 'Select Event Types')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form method="post" action="{{ route('eventTypes.select') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            @foreach($eventTypes as $eventType)
                                <div class="zinput zcheckbox">
                                    <input id="category-{{ $eventType->id }}"
                                           name="event_types[]"
                                           type="checkbox"
                                           value="{{ $eventType->id }}"
                                           @if(in_array($eventType->id, $selectedEventTypeIds)) checked @endif
                                    >
                                    <label for="category-{{ $eventType->id }}">{{ $eventType->name }}</label>
                                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            @if($eventTypes->count())
                                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                            @endif
                            <a href="{{ route('eventTypes.add') }}" class="btn btn-outline-primary mt-3">My event type is not listed!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection