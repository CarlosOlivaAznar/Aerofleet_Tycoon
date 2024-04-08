<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarEspacios')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Comprar Espacios</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('espacios.index') }}">Espacios</a></li>
            <li>/</li>
            <li><span>Comprar Espacios</span></li>
          </ul>
        </div>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST">
          @csrf
          <div class="divRepartido">
            <div class="input">
              <h3>Selecciona un Aeropuerto</h3>
              <select name="aeropuerto" id="aeropuerto" onclick="mostrarPrecio()">
                @foreach ($aeropuertos as $aeropuerto)
                <option value="{{ $aeropuerto->icao }}">{{ $aeropuerto->icao }}, {{ $aeropuerto->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="input">
              <h3>Precio</h3>
              <p id="costeOperacion"></p>
            </div>
            <div class="input">
              <h3>Espacios a comprar</h3>
              <input type="number" name="espacios" min="1" id="espacios" onkeyup="mostrarPrecioTotal()" onchange="mostrarPrecioTotal()">
            </div>
            <div class="input">
              <h3>Precio Total:</h3>
              <p id="precioTotal"></p>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="Comprar Espacios" id="comprarEspacios">
          </div>

          
          <!-- Precios de los espacios -->
          @foreach ($aeropuertos as $aeropuerto)
          <input type="hidden" id="{{ $aeropuerto->icao }}" value="{{ $aeropuerto->costeOperacional }}">
          @endforeach

          <!-- Aeropuertos -->
          @foreach ($aeropuertosMapa as $aeropuerto)
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[0] }}">
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[1] }}">
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[2] }}">
          @endforeach

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


          var domAeropuertos = document.getElementsByClassName("aeropuertos");

          var aeropuertos = Array();

          for(var i = 0; i < domAeropuertos.length; i++){
            aeropuertos.push(domAeropuertos[i].value);
          }

          for(var i = 0; i < aeropuertos.length/3; i++){
            L.marker([aeropuertos[(i*3)], aeropuertos[(i*3)+1]], {
              icon: airportIcon
            }).addTo(map).bindPopup(aeropuertos[(i*3)+2]);
          }
      </script>
      </div>
      
      <script>
        // Al iniciar la pagina muestra el precio ya
        mostrarPrecio();

        function mostrarPrecio()
        {
          var icao = document.getElementById("aeropuerto").value;
          var costeOperacion = parseInt(document.getElementById(icao).value) * 723;
          var mostrarPrecio = document.getElementById("costeOperacion");

          // Mostrar precio en el parrafo
          mostrarPrecio.innerHTML = costeOperacion;

          // Reseteamos el precio total
          mostrarPrecioTotal();
        }

        function mostrarPrecioTotal()
        {
          // Mostrar precio segun los espacios
          var numEspacios = parseInt(document.getElementById("espacios").value);
          var precioTotal = document.getElementById("precioTotal");
          
          if(!isNaN(numEspacios)){
          // CosteOperacion para hacer el calculo
          var icao = document.getElementById("aeropuerto").value;
          var costeOperacion = parseInt(document.getElementById(icao).value) * 723;

          precioTotal.innerHTML = costeOperacion * numEspacios;
          } else {
            precioTotal.innerHTML = 0;
          }
        }
      </script>
    </main>
  </div>
</body>
</html>