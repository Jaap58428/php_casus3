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
              <h3>Registratie</h3>
              <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="login-input login-text">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="login-input login-text">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="login-input login-text">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                          @if ($errors->has('password'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="login-input login-text">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal wachtwoord') }}</label>

                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
              </form>

            @endauth
          @endif
        </div>
      </div>
    </body>
</html>
