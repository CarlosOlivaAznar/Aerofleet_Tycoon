@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarEspacios')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera pagina">
        <div class="titulo">
          <h1>{{ __('slots.slots') }}</h1>
        </div>
        <a href="{{ route('espacios.aeropuertos') }}" class="boton">
          <i class="bx bx-plus-circle"></i>
          <span>{{ __('slots.buySlots') }}</span>
        </a>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($espacios) > 0)
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-space-bar"></i>
          <h3>{{ __('slots.slotsAva') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('slots.airport') }}</th>
              <th>{{ __('slots.name') }}</th>
              <th>{{ __('slots.inProperty') }}</th>
              <th>{{ __('slots.ocupied') }}</th>
              <th>{{ __('slots.available') }}</th>
              <th>{{ __('slots.costPerOperation') }}</th>
              <th>{{ __('slots.pricePerSlot') }}</th>
              <th>{{ __('slots.acctions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($espacios as $espacio)
            <tr>
              <td>{{ $espacio->aeropuerto->icao }}</td>
              <td>{{ $espacio->aeropuerto->nombre }}</td>
              <td>{{ $espacio->numeroDeEspacios }}</td>
              <td>{{ $espacio->espaciosOcupados() }}</td>
              <td>{{ $espacio->espaciosDisponibles() }}</td>
              <td>{{ number_format($espacio->aeropuerto->costeOperacional, 0, ',', '.') }}</td>
              <td>{{ number_format($espacio->aeropuerto->precioEspacio(), 0, ',', '.') }}</td>
              <td><a class="vender tooltip" data-modal-target="modalVender{{ $espacio->id }}">
                <i class="bx bx-money-withdraw"></i>
                <span class="tooltiptext">{{ __('slots.sellSlot') }}</span>
              </a></td>
            </tr>

            <!-- Modal vender -->
            <div class="modal" id="modalVender{{ $espacio->id }}">
              <div class="contenido-modal">
                <div class="cabecera-modal">
                  <span class="cerrar-modal">&times;</span>
                  <h2>{{ __('slots.sellSlot') }}</h2>
                </div>
                <div class="cuerpo-modal">
      
                  <p>{{ __('slots.sellConfirm') }}</p><br>
                  <p>{{ __('slots.infoSlot') }}
                    <span class="verde">{{ number_format($espacio->aeropuerto->precioEspacio(), 0, ',', '.') }}€</span>
                  </p>
                  
                </div>
                <div class="footer-modal">
                  <div class="botones">
                    <span class="cancelar">{{ __('slots.deny') }}</span>
                    <a href="{{ route('espacios.vender', ['id' => $espacio->id]) }}" class="aceptar">{{ __('slots.confirm') }}</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('slots.noSlots') }}</h4>
          </div>
      @endif
      
      
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()