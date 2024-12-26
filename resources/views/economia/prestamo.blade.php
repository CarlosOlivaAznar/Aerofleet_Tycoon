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
            <a href="{{ route('economia.contratarPrestamo', ['id' => 1]) }}">
                <li class="move-xy">
                    <i class='bx bx-credit-card-front'></i>
                    <h3>{{ __('economy.creditLine') }}</h3>
                </li>
            </a>
            <a href="{{ route('economia.contratarPrestamo', ['id' => 2]) }}">
                <li class="move-xy">
                    <i class='bx bx-coin'></i>
                    <h3>{{ __('economy.stInvestment') }}</h3>
                </li>
            </a>
            <a href="{{ route('economia.contratarPrestamo', ['id' => 3]) }}">
                <li class="move-xy">
                    <i class='bx bx-coin-stack' ></i>
                    <h3>{{ __('economy.ltInvestment') }}</h3>
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
                <h3>{{ __('economy.loan') }} 1</h3>
            </div>
            <div class="info">
                <div class="fila">
                    <span class="titulo">{{ __('economy.ttReturned') }}:</span>
                    <span class="texto">150.000.000€</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.interestRate') }}:</span>
                    <span class="texto">10%</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.endDate') }}:</span>
                    <span class="texto">2024-12-31</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.daysLeft') }}:</span>
                    <span class="texto">5 dias</span>
                </div>
                <div class="boton">
                    <a href="">
                        {{ __('economy.returnLoan') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>{{ __('economy.loan') }} 2</h3>
            </div>
            <div class="info">
                <span class="center">Espacio disponible</span>
            </div>
        </div>
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>{{ __('economy.loan') }} 3</h3>
            </div>
            <div class="info">
                <span class="center">Espacio disponible</span>
            </div>
        </div>
      </div>
      
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()