@extends('layouts.master')

@section('title', 'Login')

@section('pageHeader')
@endsection

@section('content')
    <section class="py-0 font-1">
        <div class="container-fluid">
            <div class="row align-items-center text-center justify-content-center center-page">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <h3 class="fw-300 mb-5">Log in</h3>
                    @include('common.notifications')

                    <form method="post" action="{{ route('auth.login') }}">
                        {{ csrf_field() }}
                        <input name="email" class="form-control mb-3" type="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                        <input name="password" class="form-control mb-3" type="password" placeholder="Password" autocomplete="off">
                        <div class="row align-items-center">
                            <div class="col text-left">
                                <div class="fs--1 d-inline-block"><a href="{{ url('password/reset') }}">Forgot your password?</a></div>
                            </div>
                            <div class="col text-right">
                                <button class="btn-block btn btn-primary" type="submit">Log in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection