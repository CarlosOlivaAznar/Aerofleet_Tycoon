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
        <form action="{{ route('competencia.demandaRuta') }}" method="POST" autocomplete="off">
          <h2>Demanda de las rutas</h2>
          @csrf
          <div class="divRepartido centrado">
            <div class="input">
              <h3>Origen</h3>

              <input type="text" class="select" name="sede" id="busquedaOrigen" onfocus="mostrarDd('dropDown', this)" onblur="ocultarDd('dropDown')" onkeyup="filtrar(this, 'dropDown')" placeholder="Selecciona el origen...">
              <input type="hidden" id="origenHid" name="origenHid" value="">
              
              <div class="drop-down" id="dropDown">
                @foreach ($aeropuertos as $aeropuerto)
                    <p id="{{ $aeropuerto->id }}" onclick="seleccionar(this, 'busquedaOrigen', 'origenHid')">{{ $aeropuerto->nombre }}</p>
                @endforeach
              </div>
            </div>
            <div class="input">
              <h3>Destino</h3>
              
              <input type="text" class="select" name="sede" id="busquedaDestino" onfocus="mostrarDd('dropDown2', this)" onblur="ocultarDd('dropDown2')" onkeyup="filtrar(this, 'dropDown2')" placeholder="Selecciona el destino...">
              <input type="hidden" id="destinoHid" name="destinoHid" value="">
              
              <div class="drop-down" id="dropDown2">
                @foreach ($aeropuertos as $aeropuerto)
                    <p id="{{ $aeropuerto->id }}" onclick="seleccionar(this, 'busquedaDestino', 'destinoHid')">{{ $aeropuerto->nombre }}</p>
                @endforeach
              </div>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="Buscar" id="botonSubmit">
          </div>
        </form>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST" autocomplete="off">
          <h2>Rutas de la competencia</h2>
          @csrf
          <div class="divRepartido">
            <div class="input">
              <h3>Nombre de la compañia aerea</h3>
              
              <input type="text" class="select" name="busquedaCompanyia" id="busquedaCompanyia" onfocus="mostrarDd('dropDown3', this)" onblur="ocultarDd('dropDown3')" onkeyup="filtrar(this, 'dropDown3')" placeholder="Busca el nombre de la compañia...">
              <input type="hidden" id="companyiaHid" name="companyiaHid" value="">
              
              <div class="drop-down" id="dropDown3">
                @foreach ($companyias as $companyia)
                    <p id="{{ $companyia->id }}" onclick="seleccionar(this, 'busquedaCompanyia', 'companyiaHid')">{{ $companyia->nombreCompanyia }}</p>
                @endforeach
              </div>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="Buscar" id="botonSubmit">
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
      <script src="{{ asset('js/dropdown.js') }}"></script>
    </main>
  </div>
</body>
</html>