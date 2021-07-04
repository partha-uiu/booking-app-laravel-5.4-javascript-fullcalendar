@extends('layouts.master')

@section('title', 'Event Types')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-12 col-lg-8 text-center text-lg-left">
                    <h5 class="fw-100">Total {{ $eventTypes->count() }} event types selected</h5>
                </div>
                <div class="col-12 col-lg-4 text-center text-lg-right">
                    <a href="{{ route('eventTypes.select') }}" class="btn btn-primary">Select more event types</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(!$eventTypes->count())
                        <div class="alert alert-info">
                            No event type selected yet
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Event Types</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventTypes as $eventType)
                                    <tr>
                                        <td>{{$eventType->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection