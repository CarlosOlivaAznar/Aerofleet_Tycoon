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
          <div id="map"></div>
          <script>
              var map = L.map('map', {zoomControl: false}).setView([41.667787, -1.0376974], 13);
    
              L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
              }).addTo(map);
          </script>
        </div>
        <div class="infodatos">
          <h3>{{ $sede->aeropuerto->nombre }}</h3>
          <div class="infodividido">
            <p>Hangares disponibles:</p>
            <p>Aviones en mantenimiento:</p>
            <p>Coste operacional:</p>
            <p>Coste de alquiler:</p>
            <p>Coste Ingenieros de Mantenimiento:</p>
            <p>Costes totales:</p>
          </div>
          <div class="infodividido margin">
            <p>{{ count($sede->hangar) }}</p>
            <p>1(inop)</p>
            <p>{{ number_format($sede->aeropuerto->costeOperacional, 0, ',', '.') }}</p>
            <p>{{ number_format(($sede->aeropuerto->costeOperacional * 50) * count($sede->hangar), 0, ',', '.') }} / mes</p>
            <p>{{ number_format($sede->ingenieros * 30000, 0, ',', '.') }}€ / mes</p>
            <p>280.000€ / mes(inop)</p>
          </div>
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
      

    </main>
  </div>
</body>
</html>