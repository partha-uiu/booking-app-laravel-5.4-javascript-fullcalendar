<div class="znav-container znav znav-semi-transparent sticky-top" id="znav-container">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand fs-0 fs-sm-1" href="{{ route('home') }}">
                @if($community_center)
                    {{ $community_center->name }}
                @else
                    {{ config('app.name') }}
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger hamburger--emphatic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto text-center">
                    @if (Auth::check())
                        <li>
                            <a href="{{route('dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{route('bookings.add') }}">Booking</a>
                        </li>
                        <li>
                            <a href="{{route('expenses.add') }}">Expense</a>
                        </li>
                        <li>
                            <a href="{{route('clients') }}">Clients</a>
                        </li>
                        <li>
                            <a href="JavaScript:void(0)">Reports</a>
                            <ul class="dropdown text-left">
                                <li>
                                    <a href="{{route('reports.income') }}">Income</a>
                                </li>
                                <li>
                                    <a href="{{route('reports.expense') }}">Expense</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="JavaScript:void(0)">Settings</a>
                            <ul class="dropdown text-left">
                                @if (Auth::user()->role->name == 'admin')
                                    <li>
                                        <a href="{{route('eventTypes') }}">Event Types</a>
                                    </li>
                                    <li>
                                        <a href="{{route('expenseCategories') }}">Expense Types</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users') }}">Users List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('settings.global') }}">Global Settings</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('settings.personal') }}">Personal Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="btn btn-outline-primary btn-sm" href={{ route('auth.logout') }}>Logout</a></li>
                    @else
                        <li>
                            <a href="{{route('contact') }}">Contact Us</a>
                        </li>
                        <li>
                            <a href="tel:+8801717141905">Call +88 01717 141905</a>
                        </li>

                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>