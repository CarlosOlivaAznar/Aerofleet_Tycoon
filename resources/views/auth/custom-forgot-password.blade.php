<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main>
    <div class="pag-login" style="background-image: url({{ asset('images/bg-auth.jpg') }})">
      
        <div>
            <img src="{{ asset('images/logos/logo_AFT_.png') }}" alt="logoAFT">

            <form method="POST" action="{{ route('password.email') }}" class="formularioBasico">
                @csrf

                <div class="campos">
                    <label for="textoInformativo">{{ __('auth.infoResetPW') }}</label>
                </div>
                
                
                <!-- Email -->
                <div class="campos">
                    <label for="email">{{ __('auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error class="inputError" :messages="$errors->get('email')" />
                </div>

                <div class="campos">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                </div>

                <div class="camposBotones">
                    <input type="submit" value="{{ __('auth.sendResetLink') }}">
                </div>
            </form>
        </div>
    </div>
  </main>
</body>
</html>