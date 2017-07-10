<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="nav has-shadow" >
      <div class="container">
        <div class="nav-left">
          <a class="nav-item is-paddingless" href="{{route('home')}}">
            <img src="{{asset('images/devmarketer-logo.png')}}" alt="DevMarketer logo">
          </a>
          <a class="nav-item is-tab is-hidden-mobile m-l-10">Learn</a>
          <a class="nav-item is-tab is-hidden-mobile">Discuss</a>
          <a class="nav-item is-tab is-hidden-mobile">Share</a>
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu" style="overflow: visible">
          <a class="nav-item is-tab is-hidden-tablet is-active">Learn</a>
          <a class="nav-item is-tab is-hidden-tablet">Discuss</a>
          <a class="nav-item is-tab is-hidden-tablet">Share</a>
          @if (Auth::guest())
            <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
            <a href="{{route('register')}}" class="nav-item is-tab">Join the Community</a>
          @else
            <div class="dropdown">
              <button class="nav-item is-tab dropdown-toggle">
                <figure class="image is-16x16" style="margin-right: 8px;">
                  <img src="http://bulma.io/images/jgthms.png">
                </figure>

              </button>
              <button class="dropdown is-aligned-right nav-item is-tab" >
                Hey {{ Auth::user()->name }}
                <ul class="dropdown-menu" style="overflow: visible;">
                  <li><a href="#">
                        <span class="icon">
                          <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                        </span>Profile
                      </a>
                  </li>
                  <li><a href="#">
                        <span class="icon">
                          <i class="fa fa-fw fa-bell m-r-5"></i>
                        </span>Notifications
                      </a>
                  </li>
                  <li><a href="#">
                        <span class="icon">
                          <i class="fa fa-fw fa-cog m-r-5"></i>
                        </span>Settings
                      </a>
                  </li>
                  <li class="seperator"></li>
                  <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        <span class="icon">
                          <i class="fa fa-fw fa-sign-out m-r-5"></i>
                        </span>
                        Logout
                      </a>
                  </li>
                </ul>
              </button>
            </div>
          @endif
        </div>
      </div>
    </nav>
        {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> --}}

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
