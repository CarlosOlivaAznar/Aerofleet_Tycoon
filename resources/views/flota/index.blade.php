@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
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
                  <img class="img-avion" src="{{ asset($avion->avion->img) }}">
                </td>
                <td>{{ $avion->matricula }}</td>
                <td>{{ $avion->avion->modelo }}</td>
                <td>{{ $avion->avion->capacidad }}</td>
                <td>{{ $avion->fechaDeFabricacion }}</td>
                <td>{{ $avion->condicion }}%</td>
                <td class="estado">
                  <span class="{{ $avion->estatusC() }}">{{ $avion->estatusS() }}</span>
                </td>
                <td>{{ number_format($avion->precioVenta(), 0, ',', '.') }}</td>
                <td>
                  <a class="vender tooltip" data-modal-target="modalVender{{ $avion->id }}">
                    <i class="bx bx-money-withdraw"></i>
                    <span class="tooltiptext">{{ __('fleet.sellAircraft') }}</span>
                  </a>
                  <a class="modificar tooltip" data-modal-target="modalMantenimiento{{ $avion->id }}">
                    <i class="bx bx-wrench"></i>
                    <span class="tooltiptext">{{ __('fleet.makeMaintenance') }}</span>
                  </a>
                  <a class="comprar tooltip" href="{{ route('rutas.crearRutaAvion', ['id' => $avion->id]) }}">
                    <i class="bx bx-add-to-queue"></i>
                    <span class="tooltiptext">{{ __('fleet.createRoute') }}</span>
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
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
</body>
</html>
@endauth()