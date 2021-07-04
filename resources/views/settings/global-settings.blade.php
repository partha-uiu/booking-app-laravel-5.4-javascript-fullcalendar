@extends('layouts.master')

@section('title', 'Global Settings')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    @include('common.notifications')
                    <form method="post" action="{{ route('settings.global') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name of your community center</label>
                            <input id="name" class="form-control" name="name" value="{{ old('name', $communityCenter->name) }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="location">Location of your community center</label>
                            <input id="location" class="form-control" name="location" value="{{ old('location', $communityCenter->location) }}" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection