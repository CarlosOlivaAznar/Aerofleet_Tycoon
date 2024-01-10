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
            <li><span>Crear Ruta</span></li>
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
              <option value="07:30:00">07:30z</option>
              <option value="08:00:00">08:00z</option>
              <option value="09:30:00">09:30z</option>
              <option value="10:00:00">10:00z</option>
              <option value="11:30:00">11:30z</option>
              <option value="12:00:00">12:00z</option>
              <option value="13:30:00">13:30z</option>
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
            <select name="avion" id="avion" disabled>
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

      <div class="informacion">
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
        <h4>Ruta actual del avion:</h4>
        <div class="barraResumen">
          <div class="rutaAvion" style="width: 15%; margin-left: 0%;">LEMD - LEBL</div>
          <div class="rutaAvion" style="width: 15%; margin-left: 18%;">LEBL - LEMD</div>
          <div class="rutaAvion" style="width: 20%; margin-left: 42%;">LEMD - EGSS</div>
          <div class="rutaAvion" style="width: 20%; margin-left: 65%;">EGSS - LEMD</div>
        </div>
        <div class="barraHorarios">
          <div class="horario">06:00z</div>
          <div class="horario">07:00z</div>
          <div class="horario">08:00z</div>
          <div class="horario">09:00z</div>
          <div class="horario">10:00z</div>
          <div class="horario">11:00z</div>
          <div class="horario">12:00z</div>
          <div class="horario">13:00z</div>
          <div class="horario">14:00z</div>
          <div class="horario">15:00z</div>
          <div class="horario">16:00z</div>
          <div class="horario">17:00z</div>
          <div class="horario">18:00z</div>
          <div class="horario">19:00z</div>
          <div class="horario">20:00z</div>
          <div class="horario">21:00z</div>
          <div class="horario">22:00z</div>
          <div class="horario">23:00z</div>
          <div class="horario">24:00z</div>
          <div class="horario">00:00z</div>
          <div class="horario">01:00z</div>
          <div class="horario">02:00z</div>
          <div class="horario">03:00z</div>
          <div class="horario">04:00z</div>
        </div>
        <div class="input">
          <input id="crearRuta" type="submit" value="Crear nueva ruta">
        </div>
      </div>
    </form>
    </main>
  </div>
</body>
</html>