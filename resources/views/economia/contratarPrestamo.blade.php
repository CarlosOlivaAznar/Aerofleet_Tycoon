@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarEconomia')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('economy.takeOutLoan') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><a href="{{ route('economia.prestamos') }}">{{ __('economy.loan') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.takeOutLoan') }}</span></li>
          </ul>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="rutas">
        <form action="" method="POST" autocomplete="off">
          @csrf
          <div class="divRepartido">
            <div class="input w-100">
              <h3>Dinero</h3>

              <input type="number">
            </div>
            <div class="input">
              <h3>Meses</h3>
              <input type="number">
            </div>
            <div class="input">
              <h3>Intereses por mes:</h3>
              <p>850€</p>
            </div>
          </div>
          <div class="input submit">
            <input type="submit" value="{{ __('economy.takeOutLoan') }}" id="botonSubmit">
          </div>
        </form>
      </div>

      <div class="rutas">
        <div class="divRepartido centrado m-0">
          <div>
            <h3>Tipo de interes</h3>
            <p id="categoria"></p>
          </div>
          <div>
            <h3>Limite de meses</h3>
            <p id="demanda"></p>
          </div>
          <div>
            <h3>Limite del prestamo</h3>
            <p id="costeOperacionInfo"></p>
          </div>
        </div>
      </div>

      

      
    </main>
  </div>
@endsection()