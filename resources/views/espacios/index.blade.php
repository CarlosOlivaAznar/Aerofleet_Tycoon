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
              <td><a class="vender tooltip" href="{{ route('espacios.vender', ['id' => $espacio->id]) }}">
                <i class="bx bx-money-withdraw"></i>
                <span class="tooltiptext">{{ __('slots.sellSlot') }}</span>
              </a></td>
            </tr>
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


      
    </main>
  </div>
@endsection()