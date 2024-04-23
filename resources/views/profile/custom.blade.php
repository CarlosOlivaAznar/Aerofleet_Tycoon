<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.cuenta')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Cuenta</h1>
        </div>
      </div>

      <div class="infoBasico">
        <h3>Cerrar Sesion</h3>

        <form action="{{ route('logout') }}" method="POST" class="formularioBasico cuenta">
          @csrf

          <div class="campos">
            <input type="submit" value="Cerrar Sesion">
          </div>
        </form>
      </div>

      <div class="infoBasico">
        <h3>{{ __('Profile Information') }}</h3>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="formularioBasico cuenta">
          @csrf
          @method('patch')

          <div class="campos">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <x-input-error class="inputError" :messages="$errors->get('email')" />
          </div>

          <div class="campos">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            <x-input-error class="inputError" :messages="$errors->get('email')" />
          </div>

          @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
          <div>
            <p>
              {{ __('Your email address is unverified.') }}
              <button form="send-verification">
                {{ __('Click here to re-send the verification email.') }}
              </button>
            </p>

            @if (session('status') === 'verification-link-sent')
              <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                  {{ __('A new verification link has been sent to your email address.') }}
              </p>
            @endif
          </div>
          @endif

          <div class="campos">
            <input type="submit" value="{{ __('Save') }}">

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
          </div>

        </form>
      </div>

      <div class="infoBasico">
        <h3>{{ __('Update Password') }}</h3>

        <form method="post" action="{{ route('password.update') }}" class="formularioBasico cuenta">
          @csrf
          @method('put')

          <div class="campos">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('current_password')" />
          </div>

          <div class="campos">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('password')" />
          </div>

          <div class="campos">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('password_confirmation')" />
          </div>

          <div class="campos">
            <input type="submit" value="{{ __('Save') }}">

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
          </div>

        </form>
      </div>

      <div class="infoBasico">
        <h3>{{ __('Delete Account') }}</h3>

        <p>
          {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <div class="campos" style="margin-top: 30px">
          <a data-modal-target="borrarCuenta" class="botonSubmit">{{ __('Delete Account') }}</a>
        </div>

        <div class="modal" id="borrarCuenta">
          <div class="contenido-modal">
            <form method="post" action="{{ route('profile.destroy') }}">
              <div class="cabecera-modal">
                <span class="cerrar-modal">&times;</span>
                <h2>{{ __('Are you sure you want to delete your account?') }}</h2>
              </div>
              <div class="cuerpo-modal">
                @csrf
                @method('delete')
                <p>
                  {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p><br>

                <label for="password">{{ __('Password') }}</label><br>
                <input id="password" name="password" type="password" placeholder="{{ __('Password') }}">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="inputError" />
                
                
              </div>
              <div class="footer-modal">
                <div class="botones">
                  <span class="cancelar">Cancelar</span>
                  <input type="submit" class="aceptar" value="{{ __('Delete Account') }}">
                </div>
              </div>
            </form>
          </div>
        </div> 


      </div>

      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
</body>
</html>