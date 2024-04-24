<div class="menu-lateral">
    <a href="{{ route('home.index') }}" class="titulo-pag">
      <img class="icono" src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="AFT">
      <div class="titulo-nombre">Aero<span>Fleet</span></div>
    </a>
    <ul class="lista-menu">
      <li><a href="{{ route('home.index') }}"><i class="bx bx-home"></i>Home</a></li>
      <li class="active"><a href="{{ route('mapa.index') }}"><i class="bx bx-map-alt" ></i>Mapa</a></li>
      <li><a href="{{ route('flota.index') }}"><i class="bx bxs-plane" ></i>Flota</a></li>
      <li><a href="{{ route('rutas.index') }}"><i class="bx bx-map-pin"></i>Rutas</a></li>
      <li><a href="{{ route('espacios.index') }}"><i class="bx bxs-plane-land"></i>Espacios</a></li>
      <li><a href="{{ route('sede.index') }}"><i class="bx bx-buildings"></i>Sede</a></li>
      <li><a href="{{ route('competencia.index') }}"><i class="bx"><img src="{{ asset('icons/competencia.svg') }}" alt="" class="color-gris"></i>Competencia</a></li>
    </ul>
    <ul class="lista-menu">
      <li>
        <a href="{{ route('profile.edit') }}">
          <i class="bx bx-user"></i>
          Cuenta
        </a>
      </li>
    </ul>
</div>