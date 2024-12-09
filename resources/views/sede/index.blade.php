@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarSede')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('hq.headquarters') }} {{ $sede->user->nombreCompanyia }}</h1>
        </div>
      </div>

      <div class="informacion">
        <div class="mapaizq">
          <input type="hidden" id="lat" value="{{ $sede->aeropuerto->latitud }}">
          <input type="hidden" id="long" value="{{ $sede->aeropuerto->longitud }}">
          <div id="map"></div>
          <script>
            let latitud = parseFloat(document.getElementById("lat").value)
            let longitud = parseFloat(document.getElementById("long").value)

            var map = L.map('map', {zoomControl: false}).setView([latitud, longitud], 13);
  
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
          </script>
        </div>
        <div class="infodatos">
          <h3>{{ $sede->aeropuerto->nombre }}</h3>
          <table class="sinBordes">
            <tr>
              <td>{{ __('hq.hangarsAva') }}</td>
              <td>{{ count($sede->hangar) }}</td>
            </tr>
            <tr>
              <td>{{ __('hq.airplaneRep') }}</td>
              <td>{{ count($flotaMantenimiento) }}</td>
            </tr>
            <tr>
              <td>{{ __('hq.operationalC') }}</td>
              <td>{{ number_format($sede->aeropuerto->costeOperacional, 0, ',', '.') }} {{ __('hq.perFlight') }}</td>

            </tr>
            <tr>
              <td>{{ __('hq.rentalCost') }}</td>
              <td>{{ number_format($sede->aeropuerto->costeAlquiler() * count($sede->hangar), 0, ',', '.') }} {{ __('hq.costMonth') }}</td>
            </tr>
            <tr>
              <td>{{ __('hq.nEngineers') }}</td>
              <td>{{ $sede->ingenieros }}</td>
            </tr>
            <tr>
              <td>{{ __('hq.costEngineers') }}</td>
              <td>{{ number_format($sede->costeIngenieros(), 0, ',', '.') }}{{ __('hq.costMonth') }}</td>
            </tr>
            <tr>
              <td>{{ __('hq.costMonthly') }}</td>
              <td>{{ number_format($sede->costesTotales(), 0, ',', '.') }}{{ __('hq.costMonth') }}</td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="resumen sede">
        <ul>
          <li data-modal-target="modalComprarHangar">
            <i class="bx bx-building"></i>
            <h3>{{ __('hq.hangarBuy') }}</h3>
          </li>
          <li data-modal-target="modalContratarIngenieros">
            <i class="bx bx-user-plus"></i>
            <h3>{{ __('hq.hireEng') }}</h3>
          </li></a>
          <li data-modal-target="modalCambiarNombre">
            <i class="bx bx-user-plus"></i>
            <h3>{{ __('hq.changeName') }}</h3>
          </li></a>
          <li data-modal-target="modalSedeMejoras">
            <i class="bx bx-trending-up"></i>
            <h3>{{ __('hq.upgrades') }}</h3>
          </li>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($sede->hangar) > 0)
      <?php
      $contador = 0; 
      $contadorAvion = 0;
      $espaciosRestantes = count($flotaMantenimiento);
      ?>
      @foreach ($sede->hangar as $hangar)
      <?php $contador++; ?>
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-building"></i>
          <h3>{{ __('hq.hangar') }} {{ $contador }}</h3>
          <span>{{ __('hq.avaSpaces') }}
            @if ($hangar->espacios - $espaciosRestantes < 0)
              {{ 0 }}
            @else
              {{ $hangar->espacios - $espaciosRestantes }}
            @endif
          </span>
          <a class="botonTexto" data-modal-target="modalAmpliarHanagar{{ $hangar->id }}">{{ __('hq.expandHangar') }}</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('hq.aircraft') }}</th>
              <th>{{ __('hq.condition') }}</th>
              <th>{{ __('hq.acctions') }}</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < $hangar->espacios; $i++)
            <tr>
              @isset ($flotaMantenimiento[$contadorAvion])
              <td>
                <img src="{{ asset($flotaMantenimiento[$contadorAvion]->avion->img) }}" alt="avionMantenimiento">
              </td>
              <td>{{ $flotaMantenimiento[$contadorAvion]->condicion }}%</td>
              <td><a class="comprar tooltip" data-modal-target="modalQuitarMantenimiento{{ $flotaMantenimiento[$contadorAvion]->id }}">
                <i class="bx bx-minus"></i>
                <span class="tooltiptext">{{ __('hq.endMaintenance') }}</span>
              </a></td>
              <?php $contadorAvion++; ?>
              <?php $espaciosRestantes-- ?>
              @endisset
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
      @endforeach
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('hq.noHangars') }}</h4>
          </div>
      @endif
      

      <!-- Modales -->
      <!-- Modal Comprar Hangar -->
      <div class="modal" id="modalComprarHangar">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('hq.hangarBuy') }}</h2>
          </div>
          <div class="cuerpo-modal">
            <p>{{ __('hq.confirmHanBuy') }}</p><br>
            <p>{{ __('hq.hangPrice') }} = <span class="rojo">{{ $sede->costeHangar() }}€</span></p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('hq.deny') }}</span>
              <a href="{{ route('sede.comprarHangar') }}" class="aceptar">{{ __('hq.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Contratar ingenieros -->
      <div class="modal" id="modalContratarIngenieros">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('hq.hireEng') }}</h2>
          </div>
          <div class="cuerpo-modal">
            <p>{{ __('hq.confirmEngineer') }}</p><br>
            <p>{{ __('hq.engPrice') }} = <span class="rojo">{{ $sede->costeIngenieros() + ($sede->costeIngenieros() / $sede->ingenieros) }}{{ __('hq.costMonth') }}</span></p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('hq.deny') }}</span>
              <a href="{{ route('sede.contratarIngenieros') }}" class="aceptar">{{ __('hq.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>

      

      <!-- Modal Cambiar nombre -->
      <div class="modal" id="modalCambiarNombre">
        <div class="contenido-modal">
          <form action="{{ route('sede.modificarNombre') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>{{ __('hq.newName') }}</h2>
            </div>
            <div class="cuerpo-modal">
              @csrf
              <label for="precioBillete">{{ __('hq.nameModify') }}</label>
              <input type="text" name="nombreNuevo" id="nombreNuevo">
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">{{ __('hq.deny') }}</span>
                <input type="submit" class="aceptar" value="{{ __('hq.confirm') }}">
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal Sede Mejoras -->
      <div class="modal" id="modalSedeMejoras">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('hq.hqUpgrades') }}</h2>
          </div>
          <div class="cuerpo-modal">
            <p>{{ __('hq.upgradesNA') }}</p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('hq.deny') }}</span>
              <a href="#" class="aceptar">{{ __('hq.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Quitar Mantenimiento Aviones -->
      @foreach ($flotaMantenimiento as $flota)
      <div class="modal" id="modalQuitarMantenimiento{{ $flota->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('hq.quitMaintenance') }}</h2>
          </div>
          <div class="cuerpo-modal">
            <p>{{ __('hq.confirmQuitM') }}</p><br>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('hq.deny') }}</span>
              <a href="{{ route('sede.quitarMantenimiento', ['id' => $flota->id]) }}" class="aceptar">{{ __('hq.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <!-- Modal Ampliar hangar -->
      @foreach ($sede->hangar as $hangar)
      <div class="modal" id="modalAmpliarHanagar{{ $hangar->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('hq.expandHangar') }}</h2>
          </div>
          <div class="cuerpo-modal">
            <p>{{ __('hq.confirmExpand') }}</p><br>
            <p>{{ __('hq.expandPrice') }} = <span class="rojo">{{ $sede->costeAmpliarHangar()}}€</span></p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('hq.deny') }}</span>
              <a href="{{ route('sede.ampliarHangar', ['id' => $hangar->id]) }}" class="aceptar">{{ __('hq.confirm') }}</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
      <script src="{{ asset('js/modals.js') }}"></script>

    </main>
  </div>
@endsection()