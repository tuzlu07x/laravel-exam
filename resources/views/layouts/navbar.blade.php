<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <x-nav-link href="{{ url('/') }}">
            <x-application-logo width="28" class="brand-image" />
            <span class="d-none d-sm-inline-block brand-text font-weight-bolder">{{ config('app.name') }}</span>
        </x-nav-link>
        <x-nav-link href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            <span class="d-none d-sm-inline-block">{{ __('Home') }}</span>
        </x-nav-link>

        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <i class="fas fa-desktop"></i>
            <span class="d-none d-sm-inline-block"> {{ __('Dashboard') }} </span>
        </x-nav-link>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            <i class="fas fa-sign-in-alt"></i>
            <span class="d-none d-sm-inline-block">{{ __('Log in') }}</span>
        </x-nav-link>

        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
            <i class="fas fa-user-plus"></i>
            <span class="d-none d-sm-inline-block"> {{ __('Register') }}</span>
        </x-nav-link>
        <!-- Authentication Links -->
        @auth
        <x-dropdown id="navbarDropdown" class="user-menu">
            <x-slot name="trigger">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
        @endauth
    </ul>
</nav>
<!-- /.navbar -->
