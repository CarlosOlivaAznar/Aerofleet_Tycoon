<footer>
    <div class="contenidoFooter">
      <div class="izquierda">
        <div class="imagen-texto">
          <img src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="">
          <h4>Aerofleet Tycoon</h4>
        </div>
        <p class="autor">Desarrollado por Carlos Oliva Aznar</p>
        <p class="autor">Copyright © 2024 Aerofleet Tycoon</p>
      </div>
      <div>
        <p class="titulo">Sobre Mi</p>
        <p class="texto"><a href="{{ route('landing.sobreMi') }}">Sobre mi</a></p>
        <p class="texto"><a href="">Blog</a></p>
        <p class="texto"><a href="">Contactame</a></p>
      </div>
      <div>
        <p class="titulo">Información</p>
        <p class="texto"><a href="{{ route('landing.donar') }}">Donar</a></p>
        <p class="texto"><a href="https://discord.gg/sUueRvrttY" target="_blank">Discord</a></p>
        <p class="texto"><a href="{{ route('landing.tutorial') }}">Tutorial</a></p>
      </div>
      <div class="derecha">
        <p class="titulo">Información Adicional</p>
        <p class="texto"><a href="{{ route('landing.terminosCondiciones') }}">Terminos y condiciones de uso</a></p>
        <p class="texto"><a href="{{ route('landing.politicaPrivacidad') }}">Politica de Privacidad</a></p>
        <p class="texto"><a href="">Roadmap</a></p>
      </div>
    </div>
</footer>