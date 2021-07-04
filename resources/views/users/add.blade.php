@extends('layouts.master')

@section('title', 'Add New User')

@section('content')
    <section class="font-1 pt-4 inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    @include('common.notifications')
                    <form method="post" action="{{ route('users.add') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" name="name" value="{{ old('name') }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" name="email" value="{{ old('email') }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="" disabled selected>Select Role</option>
                                @foreach($roles as $rolesList)
                                    <option value="{{ $rolesList->id }}">{{ $rolesList->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" name="password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" name="password_confirmation" type="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('users') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection