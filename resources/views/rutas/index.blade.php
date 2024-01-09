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
          <h1>Rutas</h1>
        </div>
        <a href="{{ route('rutas.crearRuta') }}" class="boton">
          <i class="bx bx-plus-circle"></i>
          <span>Crear Ruta</span>
        </a>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-outline"></i>
          <h3>Rutas Activas</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Distancia</th>
              <th>Tiempo</th>
              <th>Hora de salida</th>
              <th>Hora de llegada</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rutas as $ruta)
            <tr>
              <td><i class="bx"><img src="{{ asset($ruta->flota->avion->img) }}" alt=""></i></td>
              <td>{{ $ruta->espacio_departure->aeropuerto->icao }}</td>
              <td>{{ $ruta->espacio_arrival->aeropuerto->icao }}</td>
              <td>{{ $ruta->distancia }}km</td>
              <td>{{ $ruta->tiempoEstimado }}</td>
              <td>{{ $ruta->horaInicio }}</td>
              <td>{{ $ruta->horaFin }}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>