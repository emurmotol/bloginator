<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <strong class="logo-font"><i class="fa fa-rss" aria-hidden="true"></i>{{ trans('app.title') }}</strong>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                @if (Auth::guest())
                    <li {{ (Request::is('donate') ? 'class=active' : '') }}>
                        <a href="{{ url('donate') }}">Donate</a>
                    </li>
                    <li {{ (Request::is('blog') ? 'class=active' : '') }}>
                        <a href="{{ url('blog') }}">Blog</a></li>
                    <li {{ (Request::is('faq') ? 'class=active' : '') }}>
                        <a href="{{ url('faq') }}">FAQ</a></li>
                @else
                    <li {{ (Request::is('admin.dashboard') ? 'class=active' : '') }}>
                        <a href="{{ route('admin.dashboard', Auth::user()->username) }}">Dashboard</a>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="text-center auth-links">
                        <span id="pad"></span>
                        <button class="btn btn-default navbar-btn"
                                onclick="location.href='{{ url('login') }}';">Sign in
                        </button>
                        <button class="btn btn-success navbar-btn register-btn"
                                onclick="location.href='{{ url('register') }}';">Sign up
                        </button>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $profile->getUserAuthName(Auth::id()) }}
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>