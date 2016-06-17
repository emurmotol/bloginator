@if (Auth::guest())
    <link rel="stylesheet" href="{{ elixir('assets/css/guest.css') }}">
@else
    <link rel="stylesheet" href="{{ elixir('assets/css/dashboard.css') }}">
@endif
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>