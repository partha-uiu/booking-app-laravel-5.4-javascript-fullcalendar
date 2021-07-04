@extends('layouts.master')

@section('title', 'Forgot Password?')

@section('pageHeader')
@endsection

@section('content')
    <section class="py-0 font-1">
        <div class="container-fluid">
            <div class="row align-items-center text-center justify-content-center center-page">
                <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <h3 class="fw-300 mb-5">Forgot Password?</h3>
                    @include('common.notifications')

                    <form method="post" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <input name="email" class="form-control mb-3" type="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                        <div class="row align-items-center">
                            <div class="col text-right">
                                <button class="btn-block btn btn-primary" type="submit">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
