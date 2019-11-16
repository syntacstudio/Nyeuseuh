<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('page.home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order') }}">ORDER SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CUSTOMER SUPPORT</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.index') }}">
                                    MY ACCOUNT
                                </a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('signout') }}" onclick="return confirm('Are you sure want to Sign Out?')">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                             </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group shadow mb-3 flex-row flex-md-column">
                        <li class="list-group-item w-100">
                            <a href="{{ route('customer.index') }}">Dashboard</a>
                        </li>
                        <li class="list-group-item w-100">
                            <a href="{{ route('customer.order.index') }}">My Orders</a>
                        </li>
                        <li class="list-group-item w-100">
                            <a href="{{ route('customer.setting.index') }}">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                        @yield('content')
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="list-inline pt-3">
                    <li class="list-inline-item"><a href="#">FAQs</a></li>
                    <li class="list-inline-item"><a href="#">Contact Us</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                </ul>
                <div class="text-center py-4">
                    Copyright &copy; {{ config('app.name') }}
                </div>
            </div>
        </div>
    </footer>
</html>
