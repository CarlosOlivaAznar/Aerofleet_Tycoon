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
          <div class="divRepartido centrado">
            <div class="input w-100">
              <h3>Prestamo</h3>
              <input type="number" id="prestamo" max="{{ $limitePrestamo }}" onkeyup="totalDevolver()" required>
            </div>
            <div class="input">
              <h3>Meses</h3>
              <input type="number" id="meses" min="0" max="{{ $limiteMeses }}" onkeyup="totalDevolver()" required>
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
            <p>{{ $tipoInteres }}%</p>
          </div>
          <div>
            <h3>Limite de meses</h3>
            <p>{{ $limiteMeses }}</p>
          </div>
          <div>
            <h3>Limite del prestamo</h3>
            <p>{{ number_format($limitePrestamo, 0, ',', '.') }}€</p>
          </div>
          <div>
            <h3>Total a devolver por mes:</h3>
            <p id="interesesPorMes">000€</p>
          </div>
        </div>
      </div>

      <script src="{{ asset('js/formatearPrecio.js') }}"></script>
      <script>
        function totalDevolver(){
          let prestamo = document.getElementById('prestamo').value;
          let meses = document.getElementById('meses').value;
          if(prestamo != "" && meses != ""){
            let tipoInteres = @json($tipoInteres);
            let interesesMes = (prestamo * tipoInteres) / 100 / 12;
            let devolverPorMes = prestamo / meses;

            let total = document.getElementById('interesesPorMes');
            total.innerHTML = formatearPrecio(devolverPorMes + interesesMes);

            console.log(tipoInteres, interesesMes, devolverPorMes);
          }
        }
      </script>
    </main>
  </div>
@endsection()