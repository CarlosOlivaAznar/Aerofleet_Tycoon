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
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><i class="bx"><img src="../../images/new/airbus/a320neo.png" alt=""></i></td>
              <td>LEBL</td>
              <td>LEMD</td>
              <td>460mn</td>
              <td>1:30h</td>
              <td></td>
            </tr>
            <tr>
              <td><i class="bx"><img src="../../images/new/airbus/a320neo.png" alt=""></i></td>
              <td>LEBL</td>
              <td>EGSS</td>
              <td>1130mn</td>
              <td>2:25h</td>
              <td></td>
            </tr>
            <tr>
              <td><i class="bx"><img src="../../images/new/airbus/a320neo.png" alt=""></i></td>
              <td>LEBL</td>
              <td>LEAL</td>
              <td>205mn</td>
              <td>0:45h</td>
              <td></td>
            </tr>
            <tr>
              <td><i class="bx"><img src="../../images/new/airbus/a320neo.png" alt=""></i></td>
              <td>LEBL</td>
              <td>LEMG</td>
              <td>40mn</td>
              <td>0:30h</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>