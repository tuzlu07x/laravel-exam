<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'AdminLTE' }} - {{ config('app.name','Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed font-sans antialiased sidebar-collapse">
    <div class="wrapper">

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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if (isset($header))
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col">
                            <h1>{{ $header }}</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            @endif

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            {{ $slot }}
                        </div>

                        @if (isset($aside))
                        <div class="col-lg-3">
                            {{ $aside }}
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b><a href="https://jetstream.laravel.com">Jetstream</a></b>
            </div>
            <strong>Powered by</strong> <a href="https://adminlte.io">AdminLTE</a>
        </footer>
    </div>

    @stack('scripts')
</body>

</html>