<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarCompetencia')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Competencia</h1>
        </div>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST">
          <h2>Demanda de las rutas</h2>
          @csrf
          <div class="divRepartido centrado">
            <div class="input">
              <h3>Origen</h3>
              <select name="origen" id="origen">
                
              </select>
            </div>
            <div class="input">
              <h3>Destino</h3>
              <select name="destino" id="destino">
                
              </select>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="Buscar" id="demandaRutas">
          </div>
        </form>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST">
          <h2>Rutas de la competencia</h2>
          @csrf
          <div class="divRepartido">
            <div class="input">
              <h3>Nombre de la compañia aerea</h3>
              <select name="nombreCompanyia" id="nombreCompanyia">
                
              </select>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="Buscar" id="rutasCompetencia">
          </div>
        </form>
      </div>

      <div class="mapa-ruta">
        <div id="map"></div>
        <script>
          var map = L.map('map').setView([41.667787, -1.0376974], 4);

          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          }).addTo(map);

          var airportIcon = L.icon({
            iconUrl: '../icons/torre-de-control-solid.png',
            shadowUrl: '../icons/plane-shadow.png',

            iconSize:     [20, 20],
            shadowSize:   [10, 10],
            iconAnchor:   [12.5, 12.5],
            shadowAnchor: [5, 2],
            popupAnchor:  [0, -10],
          });

      </script>
      </div>
      
    </main>
  </div>
</body>
</html>