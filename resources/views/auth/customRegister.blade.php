@extends('master')

@section('content')
  <main>
    <div class="pag-login" style="background-image: url({{ asset('images/bg-auth.jpg') }})">
      
        <div>
          <img src="{{ asset('images/logos/logo_AFT_.png') }}" alt="logoAFT">
          <form method="POST" action="{{ route('register') }}" class="formularioBasico">
            @csrf
            
            <!-- Name -->
            <div class="campos">
              <label for="name">{{ __('auth.name') }}</label>
              <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
              <x-input-error class="inputError" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div class="campos">
                <label for="email">{{ __('auth.email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error class="inputError" :messages="$errors->get('email')" />
              </div>

            <!-- Password -->
            <div class="campos">
              <label for="password">{{ __('auth.password') }}</label>
              <div class="hide-show">
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <i class='bx bx-hide' onclick="showHidePassword(this)"></i>
              </div>
              <x-input-error class="inputError" :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="campos">
                <label for="password_confirmation">{{ __('auth.confirmPsw') }}</label>
                <div class="hide-show">
                  <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                  <i class='bx bx-hide' onclick="showHidePassword(this)"></i>
                </div>
                <x-input-error class="inputError" :messages="$errors->get('password_confirmation')" />
            </div>

            <!-- Captcha -->
            <div class="camposLinea">
              {!! NoCaptcha::renderJs() !!}
              {!! NoCaptcha::display() !!}
            </div>

            <!-- Terminos y condiciones -->
            <div class="camposLinea">
                <label for="remember_me" class="checkbox">
                  <input id="remember_me" type="checkbox" required>
                  <span>{{ __('auth.tyc1') }}<a href="{{ route('landing.terminosCondiciones') }}">{{ __('auth.tyc2') }}</a></span>
                </label>
            </div>

            <div class="camposBotones">
                <a class="linkForm" href="{{ route('login') }}">
                    {{ __('auth.alreadyReg') }}
                </a>

                <input type="submit" value="{{ __('auth.register') }}">
            </div>
          </form>
        </div>
    </div>
  </main>
  <script src="{{ asset('js/showhide.js') }}"></script>
@endsection()