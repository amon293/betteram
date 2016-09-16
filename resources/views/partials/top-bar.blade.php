@if (auth()->guest())
    <div class="ui huge menu">
        <a class="item" href="{{ route('home') }}">Home</a>
        <div class="right menu">
            <a class="item" href="{{ route('login') }}">Login</a>
            <a class="item" href="{{ route('register') }}">Register</a>
        </div>
    </div>
@else
    <div class="ui huge menu">
        <a class="item" href="{{ route('home') }}">Home</a>
        <a class="item" href="{{ route('home') }}">Alerts</a>
        <a class="item" href="{{ route('home') }}">Warnings</a>
        <a class="item" href="{{ route('home') }}">Updates</a>
        <a class="item" href="{{ route('home') }}">Stock Values</a>
        <a class="item" href="{{ route('home') }}">Oil Quote</a>
        <a class="item" href="{{ route('home') }}">News</a>
        <div class="right menu">
            <a class="header item" href="{{ route('home') }}">Welcome back, {{ auth()->user()->name }}</a>

            @if(auth()->user()->isAdmin())
                <div class="ui dropdown item">
                    Admin Options <i class="dropdown icon"></i>
                    <div class="menu">
                        <a href="{{ route('airlines') }}" class="item">Airlines</a>
                        <a href="{{ route('airplanes') }}" class="item">Airplanes</a>
                        <a class="item">Create Airport</a>
                    </div>
                </div>
            @endif

            <a class="item" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
@endif
