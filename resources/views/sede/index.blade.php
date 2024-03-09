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

            var map = L.map('map', {zoomControl: false}).setView([latitud, longitud], 12);
  
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
              <td>1(inop)</td>
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
          <a href="{{ route('sede.comprarHangar') }}"><li>
            <i class="bx bx-building"></i>
            <h3>Comprar Hangar</h3>
          </li></a>
          <a href="{{ route('sede.contratarIngenieros') }}"><li>
            <i class="bx bx-user-plus"></i>
            <h3>Contratar Ingenieros</h3>
          </li></a>
          <a href="#"><li>
            <i class="bx bx-trending-up"></i>
            <h3>Mejoras</h3>
          </li></a>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($sede->hangar) > 0)
      <?php $contador = 0 ?>
      @foreach ($sede->hangar as $hangar)
      <?php $contador++ ?>
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-building"></i>
          <h3>Hangar {{ $contador }}</h3>
          <span>Espacios disponibles hangar: {{ $hangar->espacios}}</span>
          <a class="botonTexto" href="{{ route('sede.ampliarHangar', ['id' => $hangar->id]) }}">Ampliar Hangar</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Estado</th>
              <th>Finalizacion Mantenimiento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <td>
              <img src="../../images/new/airbus/a320neo.png" alt="">
            </td>
            <td>90%</td>
            <td>10/03/2024</td>
            <td><i class="bx bx-plus"></i></td>
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
      

    </main>
  </div>
</body>
</html>