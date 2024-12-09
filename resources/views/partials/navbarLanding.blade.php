<nav class="barra-login">
    <a href="{{ route('landing.landing') }}" class="titulo-pag">
        <img class="icono" src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="AFT">
        <div class="titulo-nombre">Aero<span>Fleet</span></div>
    </a>
    <div class="login">
        <div class="navegacion">
            <a href="{{ route('landing.landing') }}">
                {{ __('landing.home') }}
            </a>
            <a href="{{ route('landing.tutorial') }}">
                {{ __('landing.tutorial') }}
            </a>
            <a href="{{ route('landing.sobreMi') }}">
                {{ __('landing.aboutme') }} 
            </a>
            <a href="{{ route('landing.roadmap') }}">
                {{ __('landing.roadmap') }}
            </a>
            <a href="{{ route('landing.donar') }}">
                {{ __('landing.donate') }}
            </a>
        </div>
        <div class="lang">
            @php $language = session()->get('locale') @endphp
            <button class="langbtn">
                @switch($language)
                    @case("es")
                        <img src="{{ asset('icons/flags/es.png') }}" alt="flag-lang">
                        ES
                        @break
                    @case("en")
                        <img src="{{ asset('icons/flags/en.png') }}" alt="flag-lang">
                        EN
                        @break
                    @default
                        <img src="{{ asset('icons/flags/en.png') }}" alt="flag-lang">
                        EN
                @endswitch
                <i class="bx bxs-down-arrow"></i>
            </button>
            <div class="lang-content">
              <a href="{{ route('language.changeLink', ["lang" => "en"]) }}">
                <img src="{{ asset('icons/flags/en.png') }}" alt="flag-lang">
                EN
              </a>
              <a href="{{ route('language.changeLink', ["lang" => "es"]) }}">
                <img src="{{ asset('icons/flags/es.png') }}" alt="flag-lang">
                ES
              </a>
            </div>
        </div>
        <div><a href="{{ route('login') }}">{{ __('landing.signIn') }}</a></div>
        <div><a class="login-registrarse" href="{{ route('register') }}">{{ __('landing.signUp') }}</a></div>
    </div>
</nav>