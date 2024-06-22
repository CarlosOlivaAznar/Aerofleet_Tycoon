<table>
    <thead>
      <tr>
        <th>{{ __('fleet.aircraft') }}</th>
        <th>{{ __('fleet.model') }}</th>
        <th>{{ __('fleet.price') }}</th>
        <th>{{ __('fleet.range') }}</th>
        <th>{{ __('fleet.capacity') }}</th>
        <th>{{ __('fleet.buy') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($aviones as $avion)
      <tr>
          <td>
              <img src="{{ asset($avion->img) }}" alt="">
          </td>
          <td>{{ $avion->modelo }}</td>
          <td>{{ number_format($avion->precio, 0, ',', '.') }}</td>
          <td>{{ $avion->rango }}km</td>
          <td>{{ $avion->capacidad }}</td>
          <td><a class="comprar tooltip" data-modal-target="modalConfirmacion{{ $avion->id }}">
            <i class="bx bx-shopping-bag"></i>
            <span class="tooltiptext">Comprar Avion</span>
          </a>
          <a class="info tooltip" data-modal-target="info{{ $avion->id }}">
            <i class="bx bx-detail"></i>
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
            <th>{{ __('fleet.sellPrice') }}</th>
            <td>{{ number_format($avion->precio, 0, ',', '.') }}</td>
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
      <div class="cabecera-modal">
        <span class="cerrar-modal">&times;</span>
        <h2>{{ __('fleet.purcheaseConf') }}</h2>
      </div>
      <div class="cuerpo-modal">

        <img src="{{ asset($avion->img) }}" alt="avion">

        <p>{{ __('fleet.purcheaseText') }} {{ $avion->modelo }}?</p><br>
        <p>{{ __('fleet.purcheasePrice') }} = <span class="rojo">{{ number_format($avion->precio, 0, ',', '.') }}€</span></p>
        
      </div>
      <div class="footer-modal">
        <div class="botones">
          <span class="cancelar">{{ __('fleet.deny') }}</span>
          <a href="{{ route('flota.comprar', ['id' => $avion->id]) }}" class="aceptar">{{ __('fleet.confirm') }}</a>
        </div>
      </div>
    </div>
  </div>
@endforeach

<script src="{{ asset('js/modals.js') }}"></script>