<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
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
          <h1>Crear Ruta Avion</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('rutas.index') }}">Ruta</a></li>
            <li>/</li>
            <li><span>Crear Ruta Avion</span></li>
          </ul>
        </div>
      </div>

      <form action="{{ route('rutas.nuevaRuta') }}" method="POST">
      @csrf
      <div class="rutas">
        <div class="divRepartido">
          <div class="input">
            <h3>Destino 1</h3>
            <select name="destino1" id="destino1">
              @foreach ($espacios as $espacio)
              <option value="{{ $espacio->id }}">{{ $espacio->aeropuerto->nombre }}</option>
              @endforeach
            </select>
            <select name="horaDep" id="horaDep">
              <option value="06:00:00">06:00z</option>
              <option value="06:30:00">06:30z</option>
              <option value="07:00:00">07:00z</option>
              <option value="07:30:00">07:30z</option>
              <option value="08:00:00">08:00z</option>
              <option value="08:30:00">08:30z</option>
              <option value="09:00:00">09:00z</option>
              <option value="09:30:00">09:30z</option>
              <option value="10:00:00">10:00z</option>
              <option value="10:30:00">10:30z</option>
              <option value="11:00:00">11:00z</option>
              <option value="11:30:00">11:30z</option>
              <option value="12:00:00">12:00z</option>
              <option value="12:30:00">12:30z</option>
              <option value="13:00:00">13:00z</option>
              <option value="13:30:00">13:30z</option>
              <option value="14:00:00">14:00z</option>
              <option value="14:30:00">14:30z</option>
              <option value="15:00:00">15:00z</option>
              <option value="15:30:00">15:30z</option>
              <option value="16:00:00">16:00z</option>
              <option value="16:30:00">16:30z</option>
              <option value="17:00:00">17:00z</option>
              <option value="17:30:00">17:30z</option>
              <option value="18:00:00">18:00z</option>
              <option value="18:30:00">18:30z</option>
              <option value="19:00:00">19:00z</option>
              <option value="19:30:00">19:30z</option>
              <option value="20:00:00">20:00z</option>
              <option value="20:30:00">20:30z</option>
              <option value="21:00:00">21:00z</option>
              <option value="21:30:00">21:30z</option>
              <option value="22:00:00">22:00z</option>
              <option value="22:30:00">22:30z</option>
              <option value="23:00:00">23:00z</option>
              <option value="23:30:00">23:30z</option>
              <option value="24:00:00">24:00z</option>
            </select>
          </div>
          <div class="input">
            <h3>---</h3>
          </div>
          <div class="input">
            <h3>Destino 2</h3>
            <select name="destino2" id="destino2">
              @foreach ($espacios as $espacio)
              <option value="{{ $espacio->id }}">{{ $espacio->aeropuerto->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="input">
            <h3>---</h3>
          </div>
          <div class="input">
            <h3>Avion</h3>
            <select name="avion" id="avion">
              @foreach ($flota as $avion)
              <option value="{{ $avion->id }}">{{ $avion->avion->modelo }}, {{ $avion->matricula }}</option>
              @endforeach
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
      </script>
      </div>

      <!-- Informacion aviones -->
      @foreach ($rutas as $ruta)
          <input type="hidden" class="dato-oculto" value="{{ $ruta->horaInicio }}">
          <input type="hidden" class="dato-oculto" value="{{ $ruta->tiempoEstimado }}">
      @endforeach

      <div class="informacion bgColor">
        <div class="info">
          <h4>Distancia: </h4>
          <p>350mn</p>
        </div>
        <div class="info">
          <h4>Tiempo estimado de la ruta:</h4>
          <p>1:35 horas</p>
        </div>
        <div class="info">
          <h4>Hora de llegada aproximada:</h4>
          <p>7:30z</p>
        </div>
        <div class="info">
          <h4>Plus por falta de retorno</h4>
          <p>350.000€</p>
        </div>
      </div>   

      <div class="resumenAvion">
        <h4>Precio billete:</h4>
        <input type="range" name="precioBillete" id="precioBillete" value="50" min="5" max="600" oninput="slide(this)">
        <p>Precio: <span id="precio"></span></p>
      </div>

      <div class="resumenAvion">
        <h4>Ruta actual del avion:</h4>

        @if(count($rutas) > 0)
        <div class="tablas">
          <div class="cabecera">
            <i class="bx bx-outline"></i>
            <h3>Rutas del Avion</h3>
          </div>
          <table>
            <thead>
              <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Hora de Salida</th>
                <th>Hora de Llegada</th>
                <th>Distancia</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rutas as $ruta)
              <tr>
                <td>{{ $ruta->espacio_departure->aeropuerto->icao }}</td>
                <td>{{ $ruta->espacio_arrival->aeropuerto->icao }}</td>
                <td>{{ $ruta->horaInicio }}</td>
                <td>{{ $ruta->horaFin }}</td>
                <td>{{ $ruta->distancia }}</td>
              </tr>  
              @endforeach
            </tbody>
          </table>
        </div>
        @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>No hay rutas creadas para este avion</h4>
          </div>
        @endif

        <div class="input">
          <input id="crearRuta" type="submit" value="Crear nueva ruta">
        </div>
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
    </main>
  </div>
</body>
</html>