<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarMapa')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Mapa</h1>
        </div>
      </div>

      @foreach ($avionesVolando as $avion)
      <input type="hidden" class="avionesUsuario" value="{{ $avion[0] }}">
      <input type="hidden" class="avionesUsuario" value="{{ $avion[1] }}">
      <input type="hidden" class="avionesUsuario" value="{{ $avion[2] }}">
      @endforeach

      <div class="mapa">
        <div id="map"></div>
        <script>
          // Recuperamos todos los datos de los aviones
          var domAviones = document.getElementsByClassName("avionesUsuario");
          console.log(avionesUsuario);

          var avionesUsuario = Array();

          for (var i = 0; i < domAviones.length; i++) {
            avionesUsuario.push(domAviones[i].value);
          }

          console.log(avionesUsuario);


          var map = L.map('map').setView([41.6647603, -1.0506562], 4);

          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          }).addTo(map);

            
        </script>
      </div>
    </main>
  </div>
</body>
</html>