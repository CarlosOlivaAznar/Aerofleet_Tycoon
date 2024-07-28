<footer>
    <div class="contenidoFooter">
      <div class="izquierda">
        <div class="imagen-texto">
          <img src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="">
          <h4>Aerofleet Tycoon</h4>
        </div>
        <p class="autor">{{ __('landing.developedBy') }}</p>
        <p class="autor">Copyright © 2024 Aerofleet Tycoon</p>
      </div>
      <div>
        <p class="titulo">{{ __('landing.aboutMe') }}</p>
        <p class="texto"><a href="{{ route('landing.sobreMi') }}">{{ __('landing.aboutMe') }}</a></p>
        <p class="texto"><a href="">{{ __('landing.blog') }}</a></p>
        <p class="texto"><a href="">{{ __('landing.contactMe') }}</a></p>
      </div>
      <div>
        <p class="titulo">{{ __('landing.info') }}</p>
        <p class="texto"><a href="{{ route('landing.donar') }}">{{ __('landing.donate') }}</a></p>
        <p class="texto"><a href="https://discord.gg/sUueRvrttY" target="_blank">{{ __('landing.discord') }}</a></p>
        <p class="texto"><a href="{{ route('landing.tutorial') }}">{{ __('landing.tutorial') }}</a></p>
      </div>
      <div class="derecha">
        <p class="titulo">{{ __('landing.additionalInfo') }}</p>
        <p class="texto"><a href="{{ route('landing.terminosCondiciones') }}">{{ __('landing.termns') }}</a></p>
        <p class="texto"><a href="{{ route('landing.politicaPrivacidad') }}">{{ __('landing.privacy') }}</a></p>
        <p class="texto"><a href="">{{ __('landing.roadmap') }}</a></p>
      </div>
    </div>
</footer>