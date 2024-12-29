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
        @php
            // variable para controlar los espacios de los prestamos
            $espacios = 0;
        @endphp
        @foreach ($prestamos as $prestamo)
        <div class="contenedor">
            <div class="cabecera">
                <i class='bx bx-wallet'></i>
                <h3>{{ __('economy.loan') }} {{ $loop->index + 1 }}</h3>
            </div>
            <div class="info">
                <div class="fila">
                    <span class="titulo">{{ __('economy.ttReturned') }}:</span>
                    <span class="texto">{{ number_format($prestamo->prestamo, 0, ',', '.') }}€</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.interestRate') }}:</span>
                    <span class="texto">{{ $prestamo->interes * 100 }}%</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.endDate') }}:</span>
                    <span class="texto">{{ $prestamo->fechaFin }}</span>
                </div>
                <div class="fila">
                    <span class="titulo">{{ __('economy.daysLeft') }}:</span>
                    <span class="texto">
                        @php
                            $fechaFin = Carbon\Carbon::createFromFormat('Y-m-d', $prestamo->fechaFin);
                            $diasRestantes = $fechaFin->diffInDays(Carbon\Carbon::now());
                            echo $diasRestantes;
                        @endphp
                    </span>
                </div>
                <div class="boton">
                    <a href="">
                        {{ __('economy.returnLoan') }}
                    </a>
                </div>
            </div>
        </div>
        @php
            $espacios++;
        @endphp
        @endforeach


        @for ($i = 0; $espacios < 3 - $loops; $i++)
            <div class="contenedor">
                <div class="cabecera">
                    <i class='bx bx-wallet'></i>
                    <h3>{{ __('economy.loan') }} {{ $espacios + 1 }}</h3>
                </div>
                <div class="info">
                    <span class="center">Espacio disponible</span>
                </div>
            </div>
            @php
                $espacios++;    
            @endphp
        @endfor
      
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()