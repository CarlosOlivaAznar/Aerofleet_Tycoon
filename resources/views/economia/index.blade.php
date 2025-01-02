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
            <h3>{{ __('economy.balance') }}</h3>
        </div>
        <div class="contenido-balance">
            <div class="activo">
                <h4>{{ __('economy.currentAssets') }}</h4>
                <div>
                    <span>{{ __('economy.cash') }}</span>
                    <span>{{ number_format($user->saldo, 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>{{ __('economy.sharesValue') }}</span>
                    <span>{{ number_format(0, 0, ',', '.') }}€</span>
                </div>
                <h4>{{ __('economy.nonCurrentAssets') }}</h4>
                <div>
                    <span>{{ __('economy.hangarsValue') }}</span>
                    <span>{{ number_format($user->patrimonioSede() , 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>{{ __('economy.aircraftValue') }}</span>
                    <span>{{ number_format($user->patrimonioFlota(), 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>{{ __('economy.slotsValue') }}</span>
                    <span>{{ number_format($user->patrimonioEspacios(), 0, ',', '.') }}€</span>
                </div>
                <div class="total">
                    <span>{{ __('economy.total') }}</span>
                    <span class="verde">{{  number_format(
                        $user->saldo + $user->patrimonioSede() + $user->patrimonioFlota() + $user->patrimonioEspacios()
                    , 0, ',', '.') }}€</span>
                </div>
            </div>
            <div class="pasivo">
                <h4>{{ __('economy.currentLiabilities') }}</h4>
                <div>
                    <span>{{ __('economy.shortTermDebt') }}</span>
                    <span>{{ number_format($deudasCP, 0, ',', '.') }}€</span>
                </div>
                <div>
                    <span>{{ __('economy.leasings') }}</span>
                    <span>{{ number_format($user->patrimonioLeasings(), 0, ',', '.') }}€/{{ __('economy.month') }}</span>
                </div>
                <h4>{{ __('economy.nonCurrentLiabilities') }}</h4>
                <div>
                    <span>{{ __('economy.longTermDebt') }}</span>
                    <span>{{ number_format($deudasLP, 0, ',', '.') }}€</span>
                </div>
                <div class="total">
                    <span>{{ __('economy.total') }}</span>
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