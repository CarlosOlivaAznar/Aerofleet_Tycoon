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

          // Icono personalizado
          var planeIcon = L.icon({
              iconUrl: 'icons/plane-solid-24.png',

              iconSize:     [25, 25], // size of the icon
              shadowSize:   [0, 0], // size of the shadow
              iconAnchor:   [12.5, 12.5], // point of the icon which will correspond to marker's location
              shadowAnchor: [0, 0],  // the same for the shadow
              popupAnchor:  [0, -10] // point from which the popup should open relative to the iconAnchor
          });

          var map = L.map('map').setView([41.6647603, -1.0506562], 4);

          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          }).addTo(map);

          for(var i = 0; i < avionesUsuario.length; i++){
            L.marker([avionesUsuario[(i*3)], avionesUsuario[(i*3)+1]], {icon: planeIcon}).addTo(map).bindPopup(avionesUsuario[(i*3)+2]);
          }

          //L.marker([51.5, -0.09], {icon: planeIcon}).addTo(map).bindPopup("prueba");

            
        </script>
      </div>
    </main>
  </div>
</body>
</html>