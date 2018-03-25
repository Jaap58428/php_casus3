<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Time to Share') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif|Roboto" rel="stylesheet">

    </head>
    <body>
      <div class="wrapper">
        <img id="welcome-logo" src="/img/time2share.png" alt="Time to Share logo">
        <div class="welcome-title">
          <h1>Time to Share!</h1>
          <h2>Delen is het nieuwe nemen</h2>
        </div>
        <div class="welcome-login">
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/home') }}">Home</a>
            @else
              @include('auth.login')
              <a class="nav-link" href="{{ route('register') }}">{{ __('Nieuwe gebruiker') }}</a>
            @endauth
          @endif
        </div>
      </div>
    </body>
</html>
