@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarSede')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('economy.economy') }}</h1>
        </div>
      </div>

      <div class="resumen">
        <ul>
          <li data-modal-target="modalComprarHangar">

          </li>
          <li data-modal-target="modalContratarIngenieros">

          </li></a>
          <li data-modal-target="modalCambiarNombre">

          </li></a>
          <li data-modal-target="modalSedeMejoras">
            
          </li>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

    </main>
  </div>
@endsection()