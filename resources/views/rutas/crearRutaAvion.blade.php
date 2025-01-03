@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarRutas')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('routes.createRoute') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('rutas.index') }}">{{ __('routes.routes') }}</a></li>
            <li>/</li>
            <li><span>{{ __('routes.createRoute') }}</span></li>
          </ul>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <form action="{{ route('rutas.nuevaRuta') }}" method="POST">
      @csrf
      <div class="resumenAvion crearRuta">
        <h4>{{ __('routes.actualRoute') }}</h4>

        @if(count($rutas) > 0)
        <div class="tablas">
          <div class="cabecera">
            <i class="bx bx-outline"></i>
            <h3>{{ __('routes.airplaneRoutes') }}</h3>
          </div>
          <table>
            <thead>
              <tr>
                <th>{{ __('routes.departure') }}</th>
                <th>{{ __('routes.arrival') }}</th>
                <th>{{ __('routes.timeOfDep') }}</th>
                <th>{{ __('routes.timeOfArr') }}</th>
                <th>{{ __('routes.distance') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rutas as $ruta)
              <tr>
                <td>{{ $ruta->espacio_departure->aeropuerto->icao }}</td>
                <td>{{ $ruta->espacio_arrival->aeropuerto->icao }}</td>
                <td>{{ $ruta->horaInicio }}</td>
                <td>{{ $ruta->horaFin }}</td>
                <td>{{ $ruta->distancia }} km</td>
              </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
        @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('routes.noRoutesAirplane') }}</h4>
          </div>
        @endif
      </div>

      <div class="rutas">
        <h4 class="title-margin">{{ __('routes.newRoute') }}</h4>
        <div class="divRepartido">
          <div class="input">
            <h3>{{ __('routes.departure') }}</h3>
            <select name="destino1" id="destino1" onchange="mostrarRadio()">
              <?php $espaciosVacios = 0 ?>
              @foreach ($espacios as $espacio)
                @if ($espacio->espaciosDisponibles() > 0)
                  <option value="{{ $espacio->id }}" {{ $espacio->id == old('destino1') ? 'selected' : '' }}>
                    {{ $espacio->aeropuerto->icao }}, {{ $espacio->aeropuerto->nombre }}
                  </option>
                  <?php $espaciosVacios++; ?>
                @endif
              @endforeach
              @if ($espaciosVacios === 0)
                <option value="">{{ __('routes.noSlots') }}</option>  
              @endif
            </select>
          </div>
          <div class="input">
            <h3>{{ __('routes.timeOfDep') }}</h3>
            <select name="horaDep" id="horaDep">
              <option value="06:00:00" {{ "06:00:00" == old('horaDep') ? 'selected' : '' }}>06:00z</option>
              <option value="06:30:00" {{ "06:30:00" == old('horaDep') ? 'selected' : '' }}>06:30z</option>
              <option value="07:00:00" {{ "07:00:00" == old('horaDep') ? 'selected' : '' }}>07:00z</option>
              <option value="07:30:00" {{ "07:30:00" == old('horaDep') ? 'selected' : '' }}>07:30z</option>
              <option value="08:00:00" {{ "08:00:00" == old('horaDep') ? 'selected' : '' }}>08:00z</option>
              <option value="08:30:00" {{ "08:30:00" == old('horaDep') ? 'selected' : '' }}>08:30z</option>
              <option value="09:00:00" {{ "09:00:00" == old('horaDep') ? 'selected' : '' }}>09:00z</option>
              <option value="09:30:00" {{ "09:30:00" == old('horaDep') ? 'selected' : '' }}>09:30z</option>
              <option value="10:00:00" {{ "10:00:00" == old('horaDep') ? 'selected' : '' }}>10:00z</option>
              <option value="10:30:00" {{ "10:30:00" == old('horaDep') ? 'selected' : '' }}>10:30z</option>
              <option value="11:00:00" {{ "11:00:00" == old('horaDep') ? 'selected' : '' }}>11:00z</option>
              <option value="11:30:00" {{ "11:30:00" == old('horaDep') ? 'selected' : '' }}>11:30z</option>
              <option value="12:00:00" {{ "12:00:00" == old('horaDep') ? 'selected' : '' }}>12:00z</option>
              <option value="12:30:00" {{ "12:30:00" == old('horaDep') ? 'selected' : '' }}>12:30z</option>
              <option value="13:00:00" {{ "13:00:00" == old('horaDep') ? 'selected' : '' }}>13:00z</option>
              <option value="13:30:00" {{ "13:30:00" == old('horaDep') ? 'selected' : '' }}>13:30z</option>
              <option value="14:00:00" {{ "14:00:00" == old('horaDep') ? 'selected' : '' }}>14:00z</option>
              <option value="14:30:00" {{ "14:30:00" == old('horaDep') ? 'selected' : '' }}>14:30z</option>
              <option value="15:00:00" {{ "15:00:00" == old('horaDep') ? 'selected' : '' }}>15:00z</option>
              <option value="15:30:00" {{ "15:30:00" == old('horaDep') ? 'selected' : '' }}>15:30z</option>
              <option value="16:00:00" {{ "16:00:00" == old('horaDep') ? 'selected' : '' }}>16:00z</option>
              <option value="16:30:00" {{ "16:30:00" == old('horaDep') ? 'selected' : '' }}>16:30z</option>
              <option value="17:00:00" {{ "17:00:00" == old('horaDep') ? 'selected' : '' }}>17:00z</option>
              <option value="17:30:00" {{ "17:30:00" == old('horaDep') ? 'selected' : '' }}>17:30z</option>
              <option value="18:00:00" {{ "18:00:00" == old('horaDep') ? 'selected' : '' }}>18:00z</option>
              <option value="18:30:00" {{ "18:30:00" == old('horaDep') ? 'selected' : '' }}>18:30z</option>
              <option value="19:00:00" {{ "19:00:00" == old('horaDep') ? 'selected' : '' }}>19:00z</option>
              <option value="19:30:00" {{ "19:30:00" == old('horaDep') ? 'selected' : '' }}>19:30z</option>
              <option value="20:00:00" {{ "20:00:00" == old('horaDep') ? 'selected' : '' }}>20:00z</option>
              <option value="20:30:00" {{ "20:30:00" == old('horaDep') ? 'selected' : '' }}>20:30z</option>
              <option value="21:00:00" {{ "21:00:00" == old('horaDep') ? 'selected' : '' }}>21:00z</option>
              <option value="21:30:00" {{ "21:30:00" == old('horaDep') ? 'selected' : '' }}>21:30z</option>
              <option value="22:00:00" {{ "22:00:00" == old('horaDep') ? 'selected' : '' }}>22:00z</option>
              <option value="22:30:00" {{ "22:30:00" == old('horaDep') ? 'selected' : '' }}>22:30z</option>
              <option value="23:00:00" {{ "23:00:00" == old('horaDep') ? 'selected' : '' }}>23:00z</option>
              <option value="23:30:00" {{ "23:30:00" == old('horaDep') ? 'selected' : '' }}>23:30z</option>
            </select>
          </div>
          <div class="input">
            <h3>{{ __('routes.arrival') }}</h3>
            <select name="destino2" id="destino2" onchange="mostrarRuta()">
              @foreach ($espacios as $espacio)
                @if ($espacio->espaciosDisponibles() > 0)
                  <option value="{{ $espacio->id }}" {{ $espacio->id == old('destino2') ? 'selected' : '' }}>
                    {{ $espacio->aeropuerto->icao }}, {{ $espacio->aeropuerto->nombre }}
                  </option>
                @endif
              @endforeach
              @if ($espaciosVacios === 0)
                <option value="">{{ __('routes.noSlots') }}</option>  
              @endif
            </select>
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
            iconUrl: '../../icons/torre-de-control-solid.png',
            shadowUrl: '../../icons/plane-shadow.png',

            iconSize:     [20, 20],
            shadowSize:   [10, 10],
            iconAnchor:   [12.5, 12.5],
            shadowAnchor: [5, 2],
            popupAnchor:  [0, -10],
          });
      </script>
      </div>

      <!-- Informacion aeropuertos con espacios -->
      @foreach ($espacios as $espacio)
        @if ($espacio->espaciosDisponibles() > 0)
          <input type="hidden" class="aeropuertos" value="{{ $espacio->aeropuerto->latitud }}">
          <input type="hidden" class="aeropuertos" value="{{ $espacio->aeropuerto->longitud }}">
          <input type="hidden" class="aeropuertos" value="{{ $espacio->aeropuerto->icao }}, {{  $espacio->aeropuerto->nombre }}">
        @endif
      @endforeach

      <!-- Informacion aeropuertos -->
      @foreach ($espacios as $espacio)
        @if ($espacio->espaciosDisponibles() > 0)
          <input type="hidden" class="{{ $espacio->id }}" value="{{ $espacio->aeropuerto->latitud }}">
          <input type="hidden" class="{{ $espacio->id }}" value="{{ $espacio->aeropuerto->longitud }}">
        @endif
      @endforeach

      <!-- Informacion avion -->
      <input type="hidden" id="rangoAvion" value="{{ $flota[0]->avion->rango }}"> 

      
        @foreach ($flota as $avion)
        <input type="hidden" id="avion" name="avion" value="{{ $avion->id }}"> 
        @endforeach

      <div class="resumenAvion">
        <h4>{{ __('routes.ticketPrice') }}</h4>
        <input type="range" name="precioBillete" id="precioBillete" value="{{ old('precioBillete', 50) }}" min="5" max="600" oninput="slide(this)">
        <p>{{ __('routes.price') }} <span id="precio"></span></p>
      </div>

        <div class="input">
          <input class="margin" id="crearRuta" type="submit" value="{{ __('routes.createNewRoute') }}">
        </div>

    </form>
    <script>
      var slider = document.getElementById('precioBillete');
      var precio = document.getElementById('precio');
      // Precio por defecto al llegar a la vista
      precio.innerHTML = slider.value;

      function slide(event){
        precio.innerHTML = event.value;
      }

    </script>
    <script>
      // Mostrar los aeropuertos con espacios en el mapa
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

      // Funcionalidad mapa
      var rango = document.getElementById('rangoAvion').value;
      var polyLine = null;
      var circle = null
      mostrarRadio();

      function mostrarRadio()
      {
        var idEspacio = document.getElementById('destino1').value;
        var coordenadas = document.getElementsByClassName(idEspacio);

        if(circle != null){
          map.removeLayer(circle);
        }

        circle = L.circle([coordenadas[0].value, coordenadas[1].value], {
            color: '#2d8de8',
            fillColor: '#CFE8FF',
            fillOpacity: 0.2,
            radius: rango * 1000
        }).addTo(map);

        mostrarRuta()
      }

      function mostrarRuta()
      {
        var idEspacioOrigen = document.getElementById('destino1').value;
        var idEspacioDestino = document.getElementById('destino2').value;

        var coordenadasOrgigen = document.getElementsByClassName(idEspacioOrigen);
        var coordenadasDestino = document.getElementsByClassName(idEspacioDestino);

        if(polyLine != null){
          map.removeLayer(polyLine);
        }

        polyLine = L.polyline([
          [coordenadasOrgigen[0].value, coordenadasOrgigen[1].value],
          [coordenadasDestino[0].value, coordenadasDestino[1].value]], {
            color: 'red', 
            weight: 2
        }).addTo(map);
      }

    </script>
    </main>
  </div>
@endsection()