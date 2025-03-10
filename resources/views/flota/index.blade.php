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
      <div class="cabecera pagina">
        <div class="titulo">
          <h1>{{ __('fleet.fleet') }}</h1>
        </div>
        <a href="{{ route('flota.comprarAviones') }}" class="boton">
            <i class="bx bx-shopping-bag"></i>
            <span>{{ __('fleet.buyAircraft') }}</span>
        </a>
      </div>


      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($flota) > 0)
      <div class="tablas">
        <div class="cabecera">
            <i class="bx bxs-plane-alt"></i>
            <h3>{{ __('fleet.aircraftInProperty') }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>{{ __('fleet.aircraft') }}</th>
                    <th>{{ __('fleet.registration') }}</th>
                    <th>{{ __('fleet.model') }}</th>
                    <th>{{ __('fleet.capacity') }}</th>
                    <th>{{ __('fleet.buildDate') }}</th>
                    <th>{{ __('fleet.condition') }}</th>
                    <th class="center">{{ __('fleet.state') }}</th>
                    <th>{{ __('fleet.sellPrice') }}</th>
                    <th>{{ __('fleet.actions') }}</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($flota as $avion)
              <tr>
                <td>
                  <img class="img-avion" src="{{ asset($avion->avion->img) }}" data-modal-target="info{{ $avion->id }}">
                </td>
                <td>{{ $avion->matricula }}</td>
                <td>{{ $avion->avion->modelo }}</td>
                <td>{{ $avion->avion->capacidad }}</td>
                <td>
                  @if(!$avion->leasing)
                    {{ $avion->fechaDeFabricacion }}
                  @else
                    {{ __('fleet.leasedPlane') }}
                  @endif
                </td>
                <td>
                  @if(!$avion->leasing)
                    {{ $avion->condicion }}%
                  @else
                    n/a
                  @endif
                </td>
                <td class="estado">
                  <span class="{{ $avion->estatusC() }}">{{ $avion->estatusS() }}</span>
                </td>
                <td>
                  @if(!$avion->leasing)
                    {{ number_format($avion->precioVenta(), 0, ',', '.') }}
                  @else
                    {{ number_format($avion->avion->leasePPD(), 0, ',', '.') }}€/day
                  @endif
                </td>
                <td>
                  @if (!$avion->leasing)
                  <a class="vender tooltip" data-modal-target="modalVender{{ $avion->id }}">
                    <i class="bx bx-money-withdraw move-ef"></i>
                    <span class="tooltiptext">{{ __('fleet.sellAircraft') }}</span>
                  </a>
                  <a class="modificar tooltip move-ef" data-modal-target="modalMantenimiento{{ $avion->id }}">
                    <i class="bx bx-wrench move-ef"></i>
                    <span class="tooltiptext">{{ __('fleet.makeMaintenance') }}</span>
                  </a>
                  @endif
                  <a class="comprar tooltip move-ef" href="{{ route('rutas.crearRutaAvion', ['id' => $avion->id]) }}">
                    <i class="bx bx-add-to-queue move-ef"></i>
                    <span class="tooltiptext">{{ __('fleet.createRoute') }}</span>
                  </a>
                  <a class="info tooltip move-ef" data-modal-target="info{{ $avion->id }}">
                    <i class="bx bx-detail move-ef"></i>
                    <span class="tooltiptext">{{ __('fleet.airplaneInformation') }}</span>
                  </a>
                </td>
              </tr> 
              @endforeach
            </tbody>
        </table>
      </div>
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('fleet.noAircraft') }}</h4>
          </div>
      @endif

      <!-- Modales -->
      @foreach ($flota as $avion)
      <!-- Mantenimiento -->
      <div class="modal" id="modalMantenimiento{{ $avion->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('fleet.aircraftMaintenance') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <p>{{ __('fleet.maintenanceConfirm') }}</p><br>
            <p>{{ __('fleet.infoMaintenance') }}</p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('fleet.deny') }}</span>
              <a href="{{ route('flota.mantenimiento', ["id" => $avion->id]) }}" class="aceptar">{{ __('fleet.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Vender -->
      <div class="modal" id="modalVender{{ $avion->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('fleet.sellAircraft') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <p>{{ __('fleet.sellConfirmation') }}</p><br>
            <p>{{ __('fleet.sellInfo') }} 
            <span class="verde">{{number_format($avion->precioVenta(), 0, ',', '.')}}€</span></p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('fleet.deny') }}</span>
              <a href="{{ route('flota.vender', ["id" => $avion->id]) }}" class="aceptar">{{ __('fleet.confirm') }}</a>
            </div>
          </div>
        </div>
      </div> 

      <!-- Informacion -->
      <div class="modal" id="info{{ $avion->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('fleet.information') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <img src="{{ asset($avion->avion->img) }}" alt="avion">

            <table>
              <tr>
                <th>{{ __('fleet.model') }}</th>
                <td>{{ $avion->avion->modelo }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.range') }}</th>
                <td>{{ $avion->avion->rango }} {{ __('fleet.kilometers') }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.category') }}</th>
                <td>{{ $avion->avion->categoria() }}</td>
              </tr>
              <tr>
                @if(!$avion->leasing)
                  <th>{{ __('fleet.state') }}</th>
                  <td>{{ $avion->condicion }}%</td>
                @endif
              </tr>
              <tr>
                <th>{{ __('fleet.completedRoutes') }}</th>
                <td>{{ $avion->rutasCompletadas }} {{ __('fleet.flights') }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.flightHours') }}</th>
                <td>{{ $avion->horasCompletadas }} {{ __('fleet.hours') }}</td>
              </tr>
              <tr>
                <th>{{ __('fleet.distance') }}</th>
                <td>{{ $avion->distanciaCompletada }} {{ __('fleet.kilometers') }}</td>
              </tr>
              <tr>
                @if(!$avion->leasing)
                  <th>{{ __('fleet.lastMaintenance') }}</th>
                  <td>{{ $avion->ultimoMantenimiento }}</td>
                @else
                  <th>{{ __('fleet.endLease') }}</th>
                  <td>{{ $avion->finLeasing }}</td>
                @endif
              </tr>
            </table>
            
            <br>
          </div>
        </div>
      </div> 
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()