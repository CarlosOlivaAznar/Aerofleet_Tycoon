@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarFlota')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Bombardier</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('flota.index') }}">{{ __('fleet.fleet') }}</a></li>
            <li>/</li>
            <li><a href="{{ route('flota.comprarAviones') }}">{{ __('fleet.buyAircraft') }}</a></li>
            <li>/</li>
            <li><span>Bombardier</span></li>
          </ul>
        </div>
      </div>

      <div class="tablas">
        <div class="cabecera">
          <h3>{{ __('fleet.bombardier') }}</h3>
        </div>
        @include('partials.comprartable')
      </div>
    </main>
  </div>
@endsection()