<div class="menu-lateral">
    <a href="#" class="titulo-pag">
      <img class="icono" src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="AFT">
      <div class="titulo-nombre">Aero<span>Fleet</span></div>
    </a>
    <ul class="lista-menu">
      <li><a href="{{ route('home.index') }}"><i class="bx bx-home"></i>Home</a></li>
      <li><a href="{{ route('mapa.index') }}"><i class="bx bx-map-alt" ></i>Mapa</a></li>
      <li><a href="{{ route('flota.index') }}"><i class="bx bxs-plane" ></i>Flota</a></li>
      <li><a href="{{ route('rutas.index') }}"><i class="bx bx-map-pin"></i>Rutas</a></li>
      <li><a href="{{ route('espacios.index') }}"><i class="bx bxs-plane-land"></i>Espacios</a></li>
      <li class="active"><a href="{{ route('sede.index') }}"><i class="bx bx-buildings"></i>Sede</a></li>
    </ul>
    <ul class="lista-menu">
      <li>
        <a href="#" class="logout">
          <i class="bx bx-log-out"></i>
          Cerrar Sesion
        </a>
      </li>
    </ul>
</div>