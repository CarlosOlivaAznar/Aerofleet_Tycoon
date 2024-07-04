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
          <h1>{{ __('slots.buySlots') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('espacios.index') }}">{{ __('slots.slots') }}</a></li>
            <li>/</li>
            <li><span>{{ __('slots.buySlots') }}</span></li>
          </ul>
        </div>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST" autocomplete="off">
          @csrf
          <div class="divRepartido">
            <div class="input">
              <h3>{{ __('slots.selectAirport') }}</h3>

              <input type="text" class="select" name="aeropuertoInput" id="aeropuertoInput" onfocus="mostrarDd('dropDown', this)" onblur="ocultarDd('dropDown')" onkeyup="filtrar(this, 'dropDown')" placeholder="{{ __('slots.selectAirportHint') }}" required>
              <input type="hidden" id="aeropuerto" name="aeropuerto" value="">
              
              <div class="drop-down" id="dropDown">
                @foreach ($aeropuertos as $aeropuerto)
                    <p id="{{ $aeropuerto->icao }}" onmousedown="seleccionar(this, 'aeropuertoInput', 'aeropuerto');  mostrarPrecio(); infoAeropuerto(this)">{{ $aeropuerto->icao }}, {{ $aeropuerto->nombre }}</p>
                @endforeach
              </div>
            </div>
            <div class="input">
              <h3>{{ __('slots.price') }}</h3>
              <p id="costeOperacion"></p>
            </div>
            <div class="input">
              <h3>{{ __('slots.slotsNumber') }}</h3>
              <input type="number" name="espacios" min="1" id="espacios" onkeyup="mostrarPrecioTotal()" onchange="mostrarPrecioTotal()" required>
            </div>
            <div class="input">
              <h3>{{ __('slots.totalPrice') }}</h3>
              <p id="precioTotal"></p>
            </div>
          </div>

          <div class="input submit">
            <input type="submit" value="{{ __('slots.buySlots') }}" id="botonSubmit">
          </div>

          
          <!-- Precios de los espacios -->
          @foreach ($aeropuertos as $aeropuerto)
          <input type="hidden" id="{{ $aeropuerto->icao }}Precio" value="{{ $aeropuerto->costeOperacional }}">
          @endforeach

          <!-- Aeropuertos -->
          @foreach ($aeropuertosMapa as $aeropuerto)
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[0] }}">
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[1] }}">
            <input type="hidden" class="aeropuertos" value="{{ $aeropuerto[2] }}">
          @endforeach

        </form>
      </div>

      <div class="rutas">
        <div class="divRepartido centrado m-0">
          <div>
            <h3>{{ __('slots.category') }}</h3>
            <p id="categoria"></p>
          </div>
          <div>
            <h3>{{ __('slots.demand') }}</h3>
            <p id="demanda">{{ __('slots.selectAirportHint') }}</p>
          </div>
          <div>
            <h3>{{ __('slots.costPerOperation') }}</h3>
            <p id="costeOperacionInfo"></p>
          </div>
        </div>
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
        function mostrarPrecio()
        {
          var icao = document.getElementById("aeropuerto").value;
          var costeOperacion = parseInt(document.getElementById(icao + "Precio").value) * 723;
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
          var costeOperacion = parseInt(document.getElementById(icao + "Precio").value) * 723;

          precioTotal.innerHTML = costeOperacion * numEspacios;
          } else {
            precioTotal.innerHTML = 0;
          }
        }

        function infoAeropuerto(elemento)
        {
          let aeropuertos = @json($aeropuertos);

          // Buscamos los aeropuertos en el array
          let aeropuerto = aeropuertos.find(aeropuerto => aeropuerto.icao === elemento.id);

          if(aeropuerto){
            let categoria = document.getElementById("categoria");
            let demanda = document.getElementById("demanda");
            let costeOperacionInfo = document.getElementById("costeOperacionInfo");

            // Ponemos la informacion en el div
            // Categoria
            let categoriaString = "";
            switch(aeropuerto.categoria){
              case 1:
              categoriaString = "Muy Grande";
                break;
              case 2:
              categoriaString = "Grande";
                break;
              case 3:
              categoriaString = "Mediano";
                break;
              case 4:
              categoriaString = "Pequeño";
                break;
            }
          categoria.innerHTML = categoriaString;
          
          // Demanda
          let demandaString = "Muy Baja";
          if(aeropuerto.demanda > 0.90){
            demandaString = "Alta";
          } else if(aeropuerto.demanda > 0.80){
            demandaString = "Media";
          } else if(aeropuerto.demanda > 0.65){
            demandaString = "Baja";
          }

          demanda.innerHTML = demandaString;

          // Coste Operacional
          costeOperacionInfo.innerHTML = aeropuerto.costeOperacional;
          }
        }
      </script>
      <script src="{{ asset('js/dropdown.js') }}"></script>
    </main>
  </div>
</body>
</html>