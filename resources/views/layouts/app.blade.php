<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
    @include('layouts.chunks.head.main')

            <!-- Service Injection -->
    @inject('profile', 'App\Models\Profile')

            <!-- Title -->
    <title>{{ (!Auth::guest() ? $profile->getUserAuthName(Auth::id()) : trans('app.title')) }} - @yield('title')</title>

    <!-- Stylesheets -->
    @include('layouts.chunks.head.stylesheet')
</head>
<body id="app-layout">
<!-- Header -->
@if (Request::is('login') || Request::is('register') || Request::is('password/*'))
@include('layouts.chunks.header.auth')
@else
@include('layouts.chunks.header.main')
@endif

        <!-- Main Content -->
@yield('content')

        <!-- Patches -->
@yield('welcome')

        <!-- Footer -->
@if (Request::is('login') || Request::is('register') || Request::is('password/*'))
@include('layouts.chunks.footer.auth')
@else
@include('layouts.chunks.footer.main')
@endif

        <!-- JavaScripts -->
@include('layouts.chunks.footer.javascript')
@yield('javascript')
</body>
</html>
