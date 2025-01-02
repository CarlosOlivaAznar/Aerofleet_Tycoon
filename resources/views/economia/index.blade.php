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
            <a href="{{ route('economia.leasing') }}">
                <li class="move-xy">
                    <i class='bx bxs-plane-alt'></i>
                    <h3>{{ __('economy.leasing') }}</h3>
                </li>
            </a>
            <a href="{{ route('economia.prestamos') }}">
                <li class="move-xy">
                    <i class='bx bxs-bank'></i>
                    <h3>{{ __('economy.loan') }}</h3>
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
                    <span>{{ number_format($user->saldo, 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>Acciones:</span>
                    <span>{{ number_format(0, 0, ',', '.') }}€</span>
                </div>
                <h4>Activo no corriente</h4>
                <div>
                    <span>Hangares:</span>
                    <span>{{ number_format($user->patrimonioSede() , 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>Aviones:</span>
                    <span>{{ number_format($user->patrimonioFlota(), 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>espacios:</span>
                    <span>{{ number_format($user->patrimonioEspacios(), 0, ',', '.') }}€</span>
                </div>
                <div class="total">
                    <span>Total:</span>
                    <span class="verde">{{  number_format(
                        $user->saldo + $user->patrimonioSede() + $user->patrimonioFlota() + $user->patrimonioEspacios()
                    , 0, ',', '.') }}€</span>
                </div>
            </div>
            <div class="pasivo">
                <h4>Pasivo corriente</h4>
                <div>
                    <span>Deudas a corto plazo:</span>
                    <span>{{ number_format($deudasCP, 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>Leasings:</span>
                    <span>{{ number_format($user->patrimonioLeasings(), 0, ',', '.') }}€/{{ __('economy.month') }}</span>
                </div>
                <h4>Pasivo no corriente:</h4>
                <div>
                    <span>Deudas a largo plazo:</span>
                    <span>{{ number_format($deudasLP, 0, ',', '.') }}€</span>
                </div>
                <div class="total">
                    <span>Total:</span>
                    <span class="rojo">{{  number_format(
                        $deudasCP + $deudasLP + $user->patrimonioLeasings()
                    , 0, ',', '.') }}€</span>
                </div>
            </div>
        </div>
      </div>
    </main>
  </div>
@endsection()