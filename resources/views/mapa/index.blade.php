@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarMapa')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('map.map') }}</h1>
        </div>
      </div>

      @foreach ($avionesVolando as $avion)
        <input type="hidden" class="avionesUsuario" value="{{ $avion[0] }}">
        <input type="hidden" class="avionesUsuario" value="{{ $avion[1] }}">
        <input type="hidden" class="avionesUsuario" value="{{ $avion[2] }}">
        <input type="hidden" class="avionesUsuario" value="{{ $avion[3] }}">
      @endforeach

      @foreach ($rutas as $ruta)
        <input type="hidden" class="rutasUsuario" value="{{ $ruta[0] }}">
        <input type="hidden" class="rutasUsuario" value="{{ $ruta[1] }}">
        <input type="hidden" class="rutasUsuario" value="{{ $ruta[2] }}">
        <input type="hidden" class="rutasUsuario" value="{{ $ruta[3] }}">
      @endforeach

      <div class="mapa">
        <div id="map"></div>
        <script src="{{ asset('js/mapa.js') }}"></script>
      </div>
    </main>
  </div>
@endsection()