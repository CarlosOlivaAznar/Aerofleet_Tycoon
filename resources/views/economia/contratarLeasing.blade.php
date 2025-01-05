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
          <h1>{{ __('economy.leasePlane') }} {{ $nombre }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><a href="{{ route('economia.leasing') }}">{{ __('economy.leasing') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.leasePlane') }} {{ $nombre }}</span></li>
          </ul>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="tablas">
        <div class="cabecera">
          <i class="bx bxs-plane-take-off"></i>
          <h3>{{ __('economy.avaialblePlanes') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
                <th>{{ __('economy.aircraft') }}</th>
                <th>{{ __('economy.model') }}</th>
                <th>{{ __('economy.pricePerDay') }}</th>
                <th>{{ __('economy.range') }}</th>
                <th>{{ __('economy.capacity') }}</th>
                <th>{{ __('economy.acctions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($aviones as $avion)
            <tr>
                <td>
                    <img src="{{ asset($avion->img) }}" alt="{{ $avion->modelo }}" data-modal-target="info{{ $avion->id }}">
                </td>
                <td>{{ $avion->modelo }}</td>
                <td>{{ number_format($avion->leasePPD(), 2, ',', '.') }}</td>
                <td>{{ $avion->rango }}km</td>
                <td>{{ $avion->capacidad }}</td>
                <td><a class="comprar tooltip" data-modal-target="modalConfirmacion{{ $avion->id }}">
                    <i class="bx bx-shopping-bag move-ef"></i>
                    <span class="tooltiptext">{{ __('economy.leasePlane') }}</span>
                </a>
                <a class="info tooltip" data-modal-target="info{{ $avion->id }}">
                    <i class="bx bx-detail move-ef"></i>
                    <span class="tooltiptext">{{ __('fleet.airplaneInformation') }}</span>
                </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @foreach ($aviones as $avion)
  <!-- Informacion -->
  <div class="modal" id="info{{ $avion->id }}">
    <div class="contenido-modal">
      <div class="cabecera-modal">
        <span class="cerrar-modal">&times;</span>
        <h2>{{ __('fleet.information') }}</h2>
      </div>
      <div class="cuerpo-modal">

        <img src="{{ asset($avion->img) }}" alt="avion">

        <table>
          <tr>
            <th>{{ __('fleet.model') }}</th>
            <td>{{ $avion->modelo }}</td>
          </tr>
          <tr>
            <th>{{ __('fleet.manufacturer') }}</th>
            <td>{{ $avion->fabricante }}</td>
          </tr>
          <tr>
            <th>{{ __('fleet.pricePerDay') }}</th>
            <td>{{ number_format($avion->leasePPD(), 2, ',', '.') }}</td>
          </tr>
          <tr>
            <th>{{ __('fleet.range') }}</th>
            <td>{{ $avion->rango }} {{ __('fleet.kilometers') }}</td>
          </tr>
          <tr>
            <th>{{ __('fleet.costPerKm') }}</th>
            <td>{{ $avion->costePorKm }}€/km</td>
          </tr>
          <tr>
            <th>{{ __('fleet.timePerKm') }}</th>
            <td>{{ $avion->tiempoPorKm }}Mins/km</td>
          </tr>
          <tr>
            <th>{{ __('fleet.category') }}</th>
            <td>{{ $avion->categoria() }}</td>
          </tr>
        </table>
        
        <br>
      </div>
    </div>
  </div>

  <!-- Confirmacion de compra -->
  <div class="modal" id="modalConfirmacion{{ $avion->id }}">
    <div class="contenido-modal">
    <form action="{{ route('economia.contratarLeasing') }}" method="POST">
      <div class="cabecera-modal">
        <span class="cerrar-modal">&times;</span>
        <h2>{{ __('economy.leasePlane') }}</h2>
      </div>
      <div class="cuerpo-modal">
        @method('POST')
        @csrf

        <img src="{{ asset($avion->img) }}" alt="avion">

        <div class="campos-modal">
            <label for="numeroMeses">{{ __('economy.numberOfDays') }}</label>
            <input type="number" name="dias" id="dias" required min="1" max="90" onkeyup="calcularPrecio(this, 'precioPorDia{{$avion->id}}', {{ $avion->leasePPD() }})" placeholder="{{ __('economy.leaseValue') }}">
        </div>

        <input type="hidden" name="avion" value="{{ $avion->id }}">
        <p>{{ __('economy.leasePlaneConfirmation') }}</p>
        <p>{{ __('economy.leasePlaneInfo1') }} <span class="rojo">{{ number_format($avion->leasePPD(), 2, ',', '.') }}</span> {{ __('economy.leasePlaneInfo2') }} <span id="precioPorDia{{ $avion->id }}" class="rojo">0</span></p>
        
      </div>
      <div class="footer-modal">
        <div class="botones">
            <span class="cancelar">{{ __('economy.cancel') }}</span>
            <input type="submit" class="aceptar" value="{{ __('economy.confirm') }}">
        </div>
      </div>
    </div>
    </form>
  </div>
@endforeach

<script src="{{ asset('js/modals.js') }}"></script>
<script src="{{ asset('js/formatearPrecio.js') }}"></script>
<script>
    function calcularPrecio(element, id, price){
        let precio = parseFloat(element.value) * price;

        if(element.value == undefined || element.value == ''){
            precio = 0;
        }
        
        document.getElementById(id).innerText = formatearPrecio(precio);
    }
</script>
      
    </main>
  </div>
@endsection()