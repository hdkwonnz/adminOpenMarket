<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon for logo to add title block-->
    <link rel="icon" href="/myImages/logo/favicon.ico" type = "image/x-icon" sizes="16x16">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('myCss/layout/app.css') }}">
</head>
<body>
    <div id="app">
        <!-- navbar top -->
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/myImages/logo/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @can('isAdmin')
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link text-dark" href="#">PERMISSIONS</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.category.showCategoryForm') }}" class="nav-link text-dark" href="#">CATEGORIES</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.product.showCarouselOne') }}" class="nav-link text-dark" href="#">CAROUSELS</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.showDailyOrderSum') }}" class="nav-link text-dark">DAILY SUM</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link text-dark">NOTICES</a>
                      </li>
                    </ul>
                    @endcan

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt text-primary"></i> LOGIN
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus text-primary"></i> REGISTER
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-user text-primary text-dark"></i> {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt text-danger"></i> LOGOUT
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav><!-- end of navbar top -->

        <!-- main contents -->
        <main class="py-4">

            @yield('content')

        </main>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('extra-js')

</body>
</html>
