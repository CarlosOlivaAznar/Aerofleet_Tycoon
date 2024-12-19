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
          <h1>{{ __('economy.economy') }}</h1>
        </div>
      </div>

      <div class="resumen">
        <ul>
            <a href="">
                <li class="move-xy">
                    <i class='bx bxs-plane-alt'></i>
                    <h3>{{ __('economy.addLeasing') }}</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bxs-bank'></i>
                    <h3>{{ __('economy.addLoan') }}</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-coin-stack'></i>
                    <h3>{{ __('economy.shares') }}</h3>
                </li>
            </a>
        </ul>
      </div>

      <div class="balance">
        <div class="cabecera">
            <i class='bx bx-coin'></i>
            <h3>Balance de la empresa</h3>
        </div>
        <div class="contenido-balance">
            <div class="activo">
                <h4>Activo corriente</h4>
                <div>
                    <span>Saldo:</span>
                    <span>200.000.000€</span>
                </div>
                <div>
                    <span>Acciones:</span>
                    <span>200.000€</span>
                </div>
                <h4>Activo no corriente</h4>
                <div>
                    <span>Hangares:</span>
                    <span>145.000€</span>
                </div>
                <div>
                    <span>Aviones:</span>
                    <span>150.000.000€</span>
                </div>
                <div>
                    <span>espacios:</span>
                    <span>4.345.000€</span>
                </div>
                <div class="total">
                    <span>Total:</span>
                    <span>250.000.000€</span>
                </div>
            </div>
            <div class="pasivo">
                <h4>Pasivo corriente</h4>
                <div>
                    <span>Deudas a corto plazo:</span>
                    <span>503.230€</span>
                </div>
                <h4>Pasivo no corriente:</h4>
                <div>
                    <span>Deudas a largo plazo:</span>
                    <span>1.000.000€</span>
                </div>
                <div class="total">
                    <span>Total:</span>
                    <span>1.503.230€</span>
                </div>
            </div>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

    </main>
  </div>
@endsection()