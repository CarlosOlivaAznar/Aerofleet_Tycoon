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
          <h1>Crear Ruta</h1>
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
      
    </form>
    </main>
  </div>
</body>
</html>