@extends('layouts.master')

@section('title', 'Personal Settings')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            @include('common.notifications')
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="fw-100">Profile Settings</h4>
                    <form method="post" action="{{ route('settings.personal.profile') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="email">Your email address</label>
                            <input id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" type="email">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4 class="fw-100">Password Settings</h4>
                    <form method="post" action="{{ route('settings.personal.password') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="old_password">Your old password</label>
                            <input id="old_password" class="form-control" name="old_password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Your new password</label>
                            <input id="new_password" class="form-control" name="new_password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Confirm your new password</label>
                            <input id="new_password_confirmation" class="form-control" name="new_password_confirmation" type="password">
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