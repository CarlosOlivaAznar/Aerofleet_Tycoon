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
      <input type="hidden" class="avionesUsuario" value="{{ $avion[3] }}">
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
              shadowUrl: 'icons/plane-shadow.png',

              iconSize:     [25, 25],
              shadowSize:   [15, 15],
              iconAnchor:   [12.5, 12.5],
              shadowAnchor: [5, 2],
              popupAnchor:  [0, -10],
          });

          var map = L.map('map').setView([41.6647603, -1.0506562], 4);

          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: 'Aerofleet Tycoon'
          }).addTo(map);

          for(var i = 0; i < avionesUsuario.length; i++){
            L.marker([avionesUsuario[(i*4)], avionesUsuario[(i*4)+1]], {
              rotationAngle: avionesUsuario[(i*4)+3],
              rotationOrigin: 'center',
              icon: planeIcon
            }).addTo(map).bindPopup(avionesUsuario[(i*4)+2]);
          }


            
        </script>
      </div>
    </main>
  </div>
</body>
</html>