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
          <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Name -->
            <div class="campos">
              <label for="name">{{ __('Name') }}</label>
              <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
              <x-input-error class="inputError" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div class="campos">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error class="inputError" :messages="$errors->get('email')" />
              </div>

            <!-- Password -->
            <div class="campos">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" name="password" required autocomplete="new-password">
              <x-input-error class="inputError" :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="campos">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error class="inputError" :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Terminos y condiciones -->
            <div class="camposLinea">
                <label for="remember_me" class="checkbox">
                  <input id="remember_me" type="checkbox" required>
                  <span>Acepto los <a href="{{ route('landing.terminosCondiciones') }}">Terminos y condiciones</a></span>
                </label>
            </div>

            <div class="camposBotones">
                <a class="linkForm" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <input type="submit" value="{{ __('Register') }}">
            </div>
          </form>
        </div>
    </div>
  </main>
</body>
</html>