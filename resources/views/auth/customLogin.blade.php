@extends('master')

@section('content')
  <main>
    <div class="pag-login" style="background-image: url({{ asset('images/bg-auth.jpg') }})">
      
        <div>
          <img src="{{ asset('images/logos/logo_AFT_.png') }}" alt="logoAFT">
          <form method="POST" action="{{ route('login') }}" class="formularioBasico">
            @csrf
            
            <!-- Email -->
            <div class="campos">
              <label for="email">{{ __('auth.email') }}</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
              <x-input-error class="inputError" :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="campos">
              <label for="password">{{ __('auth.password') }}</label>
              <input id="password" type="password" name="password" required autocomplete="current-password">
              <x-input-error class="inputError" :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div class="camposLinea">
              <label for="remember_me" class="checkbox">
                <input id="remember_me" type="checkbox">
                <span>{{ __('auth.rememberMe') }}</span>
              </label>
            </div>

            <div class="camposBotones">
              @if (Route::has('password.request'))
                <a class="linkForm" href="{{ route('password.request') }}">
                    {{ __('auth.pswForgot') }}
                </a>
              @endif

              <input type="submit" value="{{ __('auth.login') }}">

            </div>
          </form>
        </div>
    </div>
  </main>
@endsection