@extends('layouts.master')

@section('title', 'Home')

@section('pageHeader')
@endsection

@section('content')
    <section class="py-3 py-lg-4 mt-0 mt-lg-4 font-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 mt-3 mr-auto order-2 order-lg-1">
                    <h4 class="fw-100 mb-3 overflow-hidden">
                        Manage your <i>Community Centers</i>
                        <span class="d-block d-sm-none"></span>
                        <span class="typed-text fw-600" data-typed-text='["Online","Easily"]'></span>
                    </h4>
                    <p>Do you manage or own a community center? Want to track your bookings, clients, payment history, expenses etc. online? <br/><br/> Track every records with any of your devices from anywhere in the world.</p>
                </div>
                <div class="col-12 col-lg-4 order-1 order-lg-2 mb-3">
                    <div class="p-3 border border-color-primary border-2x radius-primary">
                        @if(!Auth::check())
                            <h4 class="fw-300">Log in</h4>
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
                                        <button class="btn-block btn btn-primary " type="submit">Log in</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <h4 class="fw-300 mb-3">Logged in as:</h4>
                            {{ Auth::user()->name }}
                            <br>
                            <small class="text-muted">primary
                                {{ Auth::user()->role->display_name }},
                                <br/>
                                {{ Auth::user()->communityCenter->name }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-11 py-5 text-center font-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 py-5 px-xl-4 px-2">
                    <span class="d-block mb-3 fs-5 ion-social-buffer-outline"></span>
                    <h5 class="fw-400">Booking Calender</h5>
                    <p class="color-5 mb-0 fs--1">An interactive booking calender to quickly review the reserved and available dates.</p>
                </div>
                <div class="col-lg-3 col-md-6 py-5 px-xl-4 px-2">
                    <span class="d-block mb-3 fs-5 ion-ios-people-outline"></span>
                    <h5 class="fw-400">Clients &amp; Payments</h5>
                    <p class="color-5 mb-0 fs--1">View all the client list and their payment history with all the due payments.</p>
                </div>
                <div class="col-lg-3 col-md-6 py-5 px-xl-4 px-2">
                    <span class="d-block mb-3 fs-5 ion-social-usd-outline"></span>
                    <h5 class="fw-400">Income &amp; Expense</h5>
                    <p class="color-5 mb-0 fs--1">Generate income and expense report by date, month, year or any custom date range.</p>
                </div>
                <div class="col-lg-3 col-md-6 py-5 px-xl-4 px-2">
                    <span class="d-block mb-3 fs-5 ion-social-apple-outline"></span>
                    <h5 class="fw-400">Mobile App</h5>
                    <p class="color-5 mb-0 fs--1">Use it as a mobile app or desktop app and access all records from anywhere in the world</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h4 class="fw-100 mb-3">Everything you need, covered. </h4>
                    <p class="lead font-1 mb-6 color-5">Crafted with advance thinking to help you do more</p>
                    <div class="card-deck">
                        <div class="card mb-5 mb-lg-0 border-0">
                            <div class="card-header background-10 border border-bottom-0 color-9">
                                <h4 class="color-3 fw-400 py-2 m-0">Self Hosted</h4></div>
                            <div class="card-block pb-3 border border-bottom-0 color-9">
                                <h4 class="fw-400 color-1">35000 BDT</h4>
                                <h6 class="font-1 color-6">+ Your domain &amp; server cost</h6>
                                <ul class="style-check text-left font-1 mt-3 lh-8 color-4">
                                    <li>Lifetime Use</li>
                                    <li>Free Setup</li>
                                    <li>30 Days Money Back Guarantee</li>
                                    <li>12 Months Free Support</li>
                                    <li>Mobile &amp; Desktop Use</li>
                                    <li>Single License</li>
                                </ul>
                            </div>
                            <div class="card-footer background-white border-top-0 pt-3 border border-top-0 color-9">
                                <a class="btn btn-outline-primary" href="{{ route('contact') }}">Try free for 30 days</a>
                                <br>
                                <div class="fs--1 mt-2"><a href="{{ route('contact') }}">or Purchase now</a></div>
                            </div>
                        </div>
                        <div class="card mb-5 mb-lg-0 border-0">
                            <div class="card-header border border-bottom-0">
                                <h4 class="color-white fw-400 py-2 m-0">Advanced</h4>
                            </div>
                            <div class="card-block pb-3 border border-bottom-0 color-primary">
                                <h4 class="fw-400">18500 BDT</h4>
                                <h6 class="font-1 color-6">+ Server Cost 500 Taka/Month</h6>
                                <ul class="style-check text-left font-1 mt-3 lh-8 color-4">
                                    <li> No server, no setup, no maintenance - <strong>we run it for you</strong></li>
                                    <li>Free Setup</li>
                                    <li>30 Days Money Back Gurantee</li>
                                    <li>Lifetime Support</li>
                                    <li>Mobile &amp; Desktop Use</li>
                                    <li>Dedicated Support</li>
                                </ul>
                            </div>
                            <div class="card-footer background-white pt-3 border border-top-0 color-primary">
                                <a class="btn btn-primary" href="{{ route('contact') }}">Try free for 30 days</a>
                                <br>
                                <div class="fs--1 mt-2"><a href="{{ route('contact') }}">or Purchase now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-8">
                <div class="col-lg-6 text-center">
                    <h4 class="fw-100 mb-3">Top features of Community Center Booking App</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row font-1">
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Money-2 color-primary"></i>
                                <div class="media-body">Access from Anywhere in the World</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Add-UserStar color-primary"></i>
                                <div class="media-body">Secured &amp; Encrypted Data</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Monitor-Analytics color-primary"></i>
                                <div class="media-body">Assign Managers &amp; Users</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Big-Data color-primary"></i>
                                <div class="media-body">Every Details at your Fingertip</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Copyright color-primary"></i>
                                <div class="media-body">Payment &amp; Due History</div>
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="media align-items-center">
                                <i class="d-flex mr-3 fs-3 icon-Hello color-primary"></i>
                                <div class="media-body">Lifetime Updates</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="color-white font-1 text-center py-8">
        <div class="background-holder overlay overlay-1" style="background-image:url(http://dolonography.com/wp-content/uploads/2017/04/house-714-17.jpg);"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-5">
                    <h4 class="fw-300 mb-4">The best software to run your community center.</h4>
                    <a class="btn btn-primary" href="{{ route('contact') }}">Start Using Today</a>
                    <p class="pt-3 pb-0">
                        or <a class="color-white" href="tel:+8801717141905">Call for the Demo</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection