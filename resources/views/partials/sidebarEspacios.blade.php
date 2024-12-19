<div class="menu-lateral">
    <a href="{{ route('home.index') }}" class="titulo-pag">
      <img class="icono" src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="AFT">
      <div class="titulo-nombre">Aero<span>Fleet</span></div>
    </a>
    <ul class="lista-menu">
      <li><a href="{{ route('home.index') }}"><i class="bx bx-home"></i>{{ __('sidebar.home') }}</a></li>
      <li><a href="{{ route('mapa.index') }}"><i class="bx bx-map-alt" ></i>{{ __('sidebar.map') }}</a></li>
      <li><a href="{{ route('flota.index') }}"><i class="bx bxs-plane" ></i>{{ __('sidebar.fleet') }}</a></li>
      <li><a href="{{ route('rutas.index') }}"><i class="bx bx-map-pin"></i>{{ __('sidebar.routes') }}</a></li>
      <li class="active"><a href="{{ route('espacios.index') }}"><i class="bx bxs-plane-land"></i>{{ __('sidebar.slots') }}</a></li>
      <li><a href="{{ route('sede.index') }}"><i class="bx bx-buildings"></i>{{ __('sidebar.hq') }}</a></li>
      <li><a href="{{ route('economia.index') }}"><i class='bx bx-dollar-circle'></i>{{ __('economy.economy') }}</a></li>
      <li><a href="{{ route('competencia.index') }}"><i class="bx"><img src="{{ asset('icons/competencia.svg') }}" alt="" class="color-gris"></i>{{ __('sidebar.competition') }}</a></li>
    </ul>
    <ul class="lista-menu">
      <li>
        <a href="{{ route('profile.edit') }}">
          <i class="bx bx-user"></i>
          {{ __('sidebar.account') }}
        </a>
      </li>
    </ul>
</div>