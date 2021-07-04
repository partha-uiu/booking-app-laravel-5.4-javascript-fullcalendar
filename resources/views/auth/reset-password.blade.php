@extends('layouts.master')

@section('title', 'Reset Password')
@section('pageHeader')
@endsection

@section('content')
    <section class="py-0 font-1">
        <div class="container-fluid">
            <div class="row align-items-center text-center justify-content-center center-page">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <h3 class="fw-300 mb-5">Reset Password</h3>
                    @include('common.notifications')

                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input name="email" class="form-control mb-3" type="email" placeholder="Email" autocomplete="off" value="{{ $email or old('email') }}">
                        <input name="password" class="form-control mb-3" type="password" placeholder="Password" autocomplete="off">
                        <input name="password_confirmation" class="form-control mb-3" type="password" placeholder="Confirm Password" autocomplete="off">
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <button class="btn-block btn btn-primary" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
