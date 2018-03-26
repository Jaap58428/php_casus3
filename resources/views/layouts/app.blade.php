<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif|Roboto" rel="stylesheet">
</head>
<body>
  <div class="wrapper-main">
    <nav class="navbar">
      <div class="navbar-buttons">
        <span onclick="location.href='/home'">Time to Share</span>
        <span onclick="location.href='/items/create'">Item Toevoegen</span>
      </div>
      <div class="navbar-buttons">
        <span onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </nav>

    <main>
      @include('messages')
      @yield('content')
    </main>
  </div>
</body>
</html>
