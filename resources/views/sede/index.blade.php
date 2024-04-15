<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
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
          <h1>Sede</h1>
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
              <td>Hangares disponibles:</td>
              <td>{{ count($sede->hangar) }}</td>
            </tr>
            <tr>
              <td>Aviones en mantenimiento:</td>
              <td>{{ count($flotaMantenimiento) }}</td>
            </tr>
            <tr>
              <td>Coste operacional:</td>
              <td>{{ number_format($sede->aeropuerto->costeOperacional, 0, ',', '.') }} Por vuelo</td>

            </tr>
            <tr>
              <td>Coste de alquiler:</td>
              <td>{{ number_format($sede->aeropuerto->costeAlquiler() * count($sede->hangar), 0, ',', '.') }} / mes</td>
            </tr>
            <tr>
              <td>Coste Ingenieros de Mantenimiento:</td>
              <td>{{ number_format($sede->costeIngenieros(), 0, ',', '.') }}€ / mes</td>
            </tr>
            <tr>
              <td>Costes totales:</td>
              <td>{{ number_format($sede->costesTotales(), 0, ',', '.') }}€ / mes</td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="resumen sede">
        <ul>
          <li data-modal-target="modalComprarHangar">
            <i class="bx bx-building"></i>
            <h3>Comprar Hangar</h3>
          </li>
          <li data-modal-target="modalContratarIngenieros">
            <i class="bx bx-user-plus"></i>
            <h3>Contratar Ingenieros</h3>
          </li></a>
          <li data-modal-target="modalSedeMejoras">
            <i class="bx bx-trending-up"></i>
            <h3>Mejoras</h3>
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
          <h3>Hangar {{ $contador }}</h3>
          <span>Espacios disponibles hangar: {{ $hangar->espacios - $espaciosRestantes}}</span>
          <?php $espaciosRestantes -= $hangar->espacios?>
          <a class="botonTexto" href="{{ route('sede.ampliarHangar', ['id' => $hangar->id]) }}">Ampliar Hangar</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Condicion</th>
              <th>Acciones</th>
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
                <span class="tooltiptext">Finalizar Mantenimiento</span>
              </a></td>
              <?php $contadorAvion++; ?>
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
            <h4>No tienes ningun hangar en tu propiedad</h4>
          </div>
      @endif
      

      <!-- Modales -->
      <!-- Modal Comprar Hangar -->
      <div class="modal" id="modalComprarHangar">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Comprar Hangar</h2>
          </div>
          <div class="cuerpo-modal">
            <p>¿Esta seguro que quiere comprar un nuevo hangar?</p><br>
            <p>Precio del nuevo hangar = <span class="rojo">{{ $sede->costeHangar() }}€</span></p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="{{ route('sede.comprarHangar') }}" class="aceptar">Confirmar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Contratar ingenieros -->
      <div class="modal" id="modalContratarIngenieros">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Contratar Ingenieros</h2>
          </div>
          <div class="cuerpo-modal">
            <p>¿Esta seguro que quiere contratar a un nuevo ingeniero?</p><br>
            <p>El salario de los ingenieros pasara a ser = <span class="rojo">{{ $sede->costeIngenieros() + ($sede->costeIngenieros() / $sede->ingenieros) }}€ / mes</span></p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="{{ route('sede.comprarHangar') }}" class="aceptar">Confirmar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Sede Mejoras -->
      <div class="modal" id="modalSedeMejoras">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Mejoras de la Sede</h2>
          </div>
          <div class="cuerpo-modal">
            <p>Actualmente las mejoras de la sede no estan disponibles</p>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="#" class="aceptar">Confirmar</a>
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
            <h2>Retirar Del Mantenimiento</h2>
          </div>
          <div class="cuerpo-modal">
            <p>¿Esta seguro que quiere quirar el avion del mantenimiento?</p><br>
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="{{ route('sede.quitarMantenimiento', ['id' => $flota->id]) }}" class="aceptar">Confirmar</a>
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