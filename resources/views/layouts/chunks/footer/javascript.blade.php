@if (Auth::guest())
    <script src="{{ elixir('assets/js/guest.js') }}"></script>
@else
    <script src="{{ elixir('assets/js/dashboard.js') }}"></script>
@endif