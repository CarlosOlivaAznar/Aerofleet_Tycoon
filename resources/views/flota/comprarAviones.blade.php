@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarFlota')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('fleet.buyAircraft') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('flota.index') }}">{{ __('fleet.fleet') }}</a></li>
            <li>/</li>
            <li><span>{{ __('fleet.buyAircraft') }}</span></li>
          </ul>
        </div>
      </div>

      <div class="resumen-titulo">
        <i class='bx bx-shopping-bag'></i>
        <h3>{{ __('fleet.fhAircraft') }}</h3>
      </div>

      <div class="resumen">
        <ul>
          <a href="{{ route('flota.comprarAirbus') }}" class="move-xy"><li>
            <i class="bx clogo"><img src="{{ asset('icons/airbus.svg') }}" alt=""></i>
            <h3>Airbus</h3>
          </li></a>
          <a href="{{ route('flota.comprarBoeing') }}" class="move-xy"><li>
            <i class="bx clogo"><img src="{{ asset('icons/boeing.svg') }}" alt=""></i>
            <h3>Boeing</h3>
          </li></a>
          <a href="{{ route('flota.comprarEmbraer') }}" class="move-xy"><li>
            <i class="bx clogo"><img src="{{ asset('icons/embraer.png') }}" alt=""></i>
            <h3>Embraer</h3>
          </li></a>
          <a href="{{ route('flota.comprarBombardier') }}" class="move-xy"><li>
            <i class="bx clogo"><img src="{{ asset('icons/bombardier.svg') }}" alt=""></i>
            <h3>Bombardier</h3>
          </li></a>
        </ul>
      </div>

      <div class="tablas">
        <div class="cabecera">
          <i class="bx bxs-plane-take-off"></i>
          <h3>{{ __('fleet.shAircraft') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('fleet.aircraft') }}</th>
              <th>{{ __('fleet.model') }}</th>
              <th>{{ __('fleet.airline') }}</th>
              <th>{{ __('fleet.buildDate') }}</th>
              <th>{{ __('fleet.state') }}</th>
              <th>{{ __('fleet.capacity') }}</th>
              <th>{{ __('fleet.price') }}</th>
              <th>{{ __('fleet.buy') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($avionessh as $avionsh)
            <tr>
              <td>
                <img class="img-avion" src="{{ asset($avionsh->img) }}" data-modal-target="info{{ $avionsh->id }}">
              </td>
              <td>{{ $avionsh->avion->modelo }}</td>
              <td>{{ $avionsh->companyia }}</td>
              <td>{{ $avionsh->fechaDeFabricacion }}</td>
              <td>{{ $avionsh->condicion }}%</td>
              <td>{{ $avionsh->avion->capacidad }}</td>
              <td>{{ number_format($avionsh->avion->precio * ($avionsh->condicion / 100), 0, ',', '.') }}</td>
              <td><a class="comprar tooltip" data-modal-target="modalConfirmacion{{ $avionsh->id }}">
                <i class="bx bx-shopping-bag move-ef"></i>
                <span class="tooltiptext">{{ __('fleet.buyAircraft') }}</span>
              </a>
              <a class="info tooltip" data-modal-target="info{{ $avionsh->id }}">
                <i class="bx bx-detail move-ef"></i>
                <span class="tooltiptext">{{ __('fleet.airplaneInformation') }}</span>
              </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Modales -->
      @foreach ($avionessh as $avionsh)
      <!-- Informacion -->
      <div class="modal" id="info{{ $avionsh->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('fleet.information') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <img src="{{ asset($avionsh->img) }}" alt="avion">

            <table>
              <tr>
                <th>{{ __('fleet.model') }}</th>
                <td>{{ $avionsh->avion->modelo }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.airline') }}</th>
                <td>{{ $avionsh->companyia }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.sellPrice') }}</th>
                <td>{{ number_format($avionsh->avion->precio * ($avionsh->condicion / 100), 0, ',', '.') }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.range') }}</th>
                <td>{{ $avionsh->avion->rango }} {{ __('fleet.kilometers') }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.costPerKm') }}</th>
                <td>{{ $avionsh->avion->costePorKm }}€/km</td>
              </tr>
              <tr>
                <th>{{ __('fleet.timePerKm') }}</th>
                <td>{{ $avionsh->avion->tiempoPorKm }}Mins/km</td>
              </tr>
              <tr>
                <th>{{ __('fleet.category') }}</th>
                <td>{{ $avionsh->avion->categoria() }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.state') }}</th>
                <td>{{ $avionsh->condicion }}%</td>
              </tr>
              <tr>
                <th>{{ __('fleet.buildDate') }}</th>
                <td>{{ $avionsh->fechaDeFabricacion }}</td>
              </tr>
            </table>
            
            <br>
          </div>
        </div>
      </div>

      <!-- Confirmacion de compra -->
      <div class="modal" id="modalConfirmacion{{ $avionsh->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('fleet.purcheaseConf') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <img src="{{ asset($avionsh->img) }}" alt="avion">

            <p>{{ __('fleet.purcheaseText') }} {{ $avionsh->avion->modelo }} {{ $avionsh->companyia }}?</p><br>
            <p>{{ __('fleet.purcheasePrice') }} = <span class="rojo">{{ number_format($avionsh->avion->precio * ($avionsh->condicion / 100), 0, ',', '.') }}€</span></p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('fleet.deny') }}</span>
              <a href="{{ route('flota.comprarSegundaMano', ['id' => $avionsh->id]) }}" class="aceptar">{{ __('fleet.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()