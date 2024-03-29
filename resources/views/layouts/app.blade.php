<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139396030-1"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <!--  <div id="app">-->
        <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
          <a class="navbar-brand" href="#">
      <img src="/assets/images/nav_logo.png" alt="Logo" style="width:100px; height:100px;">
    </a>
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav ml-left">
                  @if(Auth::check())
                <li class="nav-item" style="margin-left:10px; margin-top:3px;">
                  <a class="nav-link" href="/test">Test</a>
                </li>
                @endif
                @if(Auth::check())
                <li class="nav-item" style="margin-left:10px; margin-top:3px;">
                  <a class="nav-link" href="/test">Test</a>
                </li>
                @endif
              </ul>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                  @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->staff >= 1)
                                <a class="dropdown-item" href="/test">
                                    Test
                                </a>
                            @endif
                            @if(Auth::user()->dispatcher == 1)
                                <a class="dropdown-item" href="/dispatch">
                                  Dispatch
                                </a>
                           @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    	onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                    </ul>
                </div>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>
  <!--  </div> -->
</body>
</html>
