<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main>
    <div class="pag-login">
      
        <div>
          <img src="{{ asset('images/logos/logo_AFT_.png') }}" alt="logoAFT">
          <form method="POST" action="{{ route('login') }}" class="formularioBasico">
            @csrf
            
            <!-- Email -->
            <div class="campos">
              <label for="email">{{ __('Email') }}</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
              <x-input-error class="inputError" :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="campos">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" name="password" required autocomplete="current-password">
              <x-input-error class="inputError" :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div class="camposLinea">
              <label for="remember_me" class="checkbox">
                <input id="remember_me" type="checkbox">
                <span>{{ __('Remember me') }}</span>
              </label>
            </div>

            <div class="camposBotones">
              @if (Route::has('password.request'))
                <a class="linkForm" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
              @endif

              <input type="submit" value="{{ __('Log in') }}">

            </div>
          </form>
        </div>
    </div>
  </main>
</body>
</html>