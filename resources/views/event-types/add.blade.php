@extends('layouts.master')

@section('title', 'Add Event Type')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    @include('common.notifications')
                    <form method="post" action="{{ route('eventTypes.add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name of the event type</label>
                            <input id="name" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('eventTypes') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection