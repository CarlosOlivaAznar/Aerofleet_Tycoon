<nav class="barra-login">
    <a href="{{ route('landing.landing') }}" class="titulo-pag">
        <img class="icono" src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="AFT">
        <div class="titulo-nombre">Aero<span>Fleet</span></div>
    </a>
    <div class="login">
        <div class="lang">
            <button class="langbtn">
                <img src="{{ asset('icons/flags/es.png') }}" alt="flag-lang">
                ES
                <i class="bx bxs-down-arrow"></i>
            </button>
            <div class="lang-content">
              <a href="#">
                <img src="{{ asset('icons/flags/en.png') }}" alt="flag-lang">
                EN
              </a>
              <a href="#">
                <img src="{{ asset('icons/flags/es.png') }}" alt="flag-lang">
                ES
              </a>
            </div>
        </div>
        <div><a href="{{ route('login') }}">{{ __('landing.signIn') }}</a></div>
        <div><a class="login-registrarse" href="{{ route('register') }}">{{ __('landing.signUp') }}</a></div>
    </div>
</nav>