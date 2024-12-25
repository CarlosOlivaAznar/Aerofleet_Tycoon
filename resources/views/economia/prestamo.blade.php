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
          <h1>{{ __('economy.loan') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.loan') }}</span></li>
          </ul>
        </div>
      </div>

      <div class="resumen">
        <ul>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-credit-card-front'></i>
                    <h3>Linea de credito</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-coin'></i>
                    <h3>Inversion a corto plazo</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-coin-stack' ></i>
                    <h3>Inversion a largo plazo</h3>
                </li>
            </a>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="contenido-responsivo">
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>Pestamo 1</h3>
            </div>
            <div class="info">
                <div class="fila">
                    <span class="titulo">Total a devolver:</span>
                    <span class="texto">150.000.000€</span>
                </div>
                <div class="fila">
                    <span class="titulo">Tipo de interes:</span>
                    <span class="texto">10%</span>
                </div>
                <div class="fila">
                    <span class="titulo">Fecha de finalizacion:</span>
                    <span class="texto">2024-12-31</span>
                </div>
                <div class="fila">
                    <span class="titulo">Dias restantes:</span>
                    <span class="texto">5 dias</span>
                </div>
                <div class="boton">
                    <a href="">
                        Devolver prestamo
                    </a>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>Pestamo 1</h3>
            </div>
            <div class="info">
                <div class="fila">
                    <span class="titulo">Total a devolver:</span>
                    <span class="texto">150.000.000€</span>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>Pestamo 1</h3>
            </div>
            <div class="info">
                <div class="fila">
                    <span class="titulo">Total a devolver:</span>
                    <span class="texto">150.000.000€</span>
                </div>
            </div>
        </div>
      </div>
      
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()