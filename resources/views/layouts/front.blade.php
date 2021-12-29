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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <x-application-logo width="40" />
                        <span class="d-none d-sm-inline-block brand-text font-weight-bolder">{{ config('app.name') }}</span>
                    </a>
                </li>

                <x-nav-link href="{{ route('front.index') }}">
                    <i class="fas fa-home"></i>
                    <span class="d-none d-sm-inline-block">{{ __('Anasayfa') }}</span>
                </x-nav-link>
        
                @if(auth()->user()->type=='admin')
                <x-nav-link href="{{ route('dashboard') }}" icon="fas fa-desktop"
                    :active="request()->routeIs('dashboard')">
                    <i class="fas fa-desktop"></i>
                    {{ __('Kontrol Paneli') }}
                </x-nav-link>
                @endif
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Route::has('login'))
                    @auth
                        <x-dropdown id="navbarDropdown" class="user-menu">
                            <x-slot name="trigger">
                                <i class="fas fa-user"></i>
                                <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Çıkış Yap') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <x-nav-link href="{{ route('login') }}" icon="fas fa-key"
                            :active="request()->routeIs('login')">
                            {{ __('Giriş Yap') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('register') }}" icon="fas fa-user-plus"
                            :active="request()->routeIs('register')">
                            {{ __('Kayıt Ol') }}
                        </x-nav-link>
                    @endauth
                @else
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary rounded-pill">
                            <i class="fas fa-user-plus"></i>
                            <span class="d-none d-sm-inline-block">{{ __('Ask for an offer') }}</span>
                        </a>
                    </li>
                @endif
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
                </div>
                <!-- /.container-fluid -->
            </section>
            @endif

            <!-- Main content -->
            <section class="content">
                <div class="">
                    <div class="row">
                       
                        <div class="col">
                            @include('layouts.alerts')
                            {{ $slot}}
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
                <b><a href="https://jetstream.laravel.com">Tuzlu Aş</a></b>
            </div>
            <strong>Powered by</strong> <a href="https://adminlte.io">FatihTuzlu</a>
        </footer>
    </div>

    @stack('scripts')
</body>

</html>