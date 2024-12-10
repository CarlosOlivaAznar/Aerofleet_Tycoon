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
                <div class="formularioBasico">



                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="campos">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" name="email"
                                value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="campos">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="campos">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="camposBotones">
                            <input type="submit" value="{{ __('Reset Password') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
