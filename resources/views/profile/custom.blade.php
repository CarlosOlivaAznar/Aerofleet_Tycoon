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
          <h1>{{ __('account.title') }}</h1>
        </div>
      </div>

      <div class="infoBasico">
        <h3>{{ __('account.logout') }}</h3>

        <form action="{{ route('logout') }}" method="POST" class="formularioBasico cuenta">
          @csrf

          <div class="campos">
            <input type="submit" value="{{ __('account.logout') }}">
          </div>
        </form>
      </div>

      <!-- Cambiar idioma -->
      <div class="infoBasico">
        <h3>{{ __('account.changeLan') }}</h3>

        <form action="{{ route('language.change') }}" method="POST" class="formularioBasico cuenta">
          @csrf

          @php $language = session()->get('locale') @endphp
          <div class="campos">
            <select name="language" id="language" class="select">
              <option value="en" @if ($language === 'en') selected @endif>English</option>
              <option value="es" @if ($language === 'es') selected @endif>Spanish</option>
            </select>
          </div>
          <div class="campos">
            <input type="submit" value="{{ __('account.changeLan') }}">
          </div>
        </form>
      </div>

      <!-- Modo Oscuro -->
      <div class="infoBasico">
        <h3>{{ __('account.darkMode') }}</h3>

        <div class="mt flex">
          <label class="switch">
            <input id="ckModoOscuro" type="checkbox" onclick="modoOscuro(this)">
            <span class="slider round"></span>
          </label>

          <p>{{ __('account.enableDarkMode') }}</p>
        </div>
      </div>

      <div class="infoBasico">
        <h3>{{ __('account.porfileInformation') }}</h3>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="formularioBasico cuenta">
          @csrf
          @method('patch')

          <div class="campos">
            <label for="name">{{ __('account.name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autocomplete="name">
            <x-input-error class="inputError" :messages="$errors->get('email')" />
          </div>

          <div class="campos">
            <label for="email">{{ __('account.email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            <x-input-error class="inputError" :messages="$errors->get('email')" />
          </div>

          @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
          <div>
            <p>
              {{ __('account.unverifiedEmail') }}
              <button form="send-verification">
                {{ __('account.resendEmail') }}
              </button>
            </p>

            @if (session('status') === 'verification-link-sent')
              <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                  {{ __('account.newVerification') }}
              </p>
            @endif
          </div>
          @endif

          <div class="campos">
            <input type="submit" value="{{ __('account.save') }}">

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('account.saved') }}</p>
            @endif
          </div>

        </form>
      </div>

      <div class="infoBasico">
        <h3>{{ __('account.updatePwd') }}</h3>

        <form method="post" action="{{ route('password.update') }}" class="formularioBasico cuenta">
          @csrf
          @method('put')

          <div class="campos">
            <label for="update_password_current_password">{{ __('account.currentPwd') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('current_password')" />
          </div>

          <div class="campos">
            <label for="update_password_password">{{ __('account.newPwd') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('password')" />
          </div>

          <div class="campos">
            <label for="update_password_password_confirmation">{{ __('account.confirmPwd') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            <x-input-error class="inputError" :messages="$errors->updatePassword->get('password_confirmation')" />
          </div>

          <div class="campos">
            <input type="submit" value="{{ __('account.save') }}">

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('account.saved') }}</p>
            @endif
          </div>

        </form>
      </div>

      <div class="infoBasico">
        <h3>{{ __('account.deleteAcc') }}</h3>

        <p>
          {{ __('account.deleteAdvise') }}
        </p>

        <div class="campos" style="margin-top: 30px">
          <a data-modal-target="borrarCuenta" class="botonSubmit">{{ __('account.deleteAcc') }}</a>
        </div>

        <div class="modal" id="borrarCuenta">
          <div class="contenido-modal">
            <form method="post" action="{{ route('profile.destroy') }}">
              <div class="cabecera-modal">
                <span class="cerrar-modal">&times;</span>
                <h2>{{ __('account.deleteConfirmation') }}</h2>
              </div>
              <div class="cuerpo-modal">
                @csrf
                @method('delete')
                <p>
                  {{ __('account.deleteAdvise') }}
                </p><br>

                <label for="password">{{ __('account.password') }}</label><br>
                <input id="password" name="password" type="password" placeholder="{{ __('account.password') }}">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="inputError" />
                
                
              </div>
              <div class="footer-modal">
                <div class="botones">
                  <span class="cancelar">{{ __('account.cancel') }}</span>
                  <input type="submit" class="aceptar" value="{{ __('account.deleteAcc') }}">
                </div>
              </div>
            </form>
          </div>
        </div> 


      </div>

      <script src="{{ asset('js/modals.js') }}"></script>
      <script>
        let checkbox = document.getElementById("ckModoOscuro");
        
        if(localStorage.modoOscuro === "true"){
          checkbox.checked = true;
        }

        function modoOscuro(elemento)
        {
          if(elemento.checked){
            localStorage.setItem("modoOscuro", "true");
            cambiarModoOscuro();
          } else {
            localStorage.setItem("modoOscuro", "false");
            cambiarModoOscuro();
          }
        }
      </script>
    </main>
  </div>
</body>
</html>