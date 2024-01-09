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
          <h1>Espacios</h1>
        </div>
        <a href="{{ route('espacios.aeropuertos') }}" class="boton">
          <i class="bx bx-plus-circle"></i>
          <span>Comprar Espacios</span>
        </a>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-space-bar"></i>
          <h3>Espacios disponibles</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>Aeropuerto</th>
              <th>Nombre</th>
              <th>Espacios Comprado</th>
              <th>Espacios Ocupados</th>
              <th>Espacios Disponibles</th>
              <th>Coste por Operacion</th>
              <th>Precio por espacio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($espacios as $espacio)
            <tr>
              <td>{{ $espacio->aeropuerto->icao }}</td>
              <td>{{ $espacio->aeropuerto->nombre }}</td>
              <td>{{ $espacio->numeroDeEspacios }}</td>
              <td>{{ $espacio->espaciosOcupados() }}</td>
              <td>{{ $espacio->espaciosDisponibles() }}</td>
              <td>{{ $espacio->aeropuerto->costeOperacional }}</td>
              <td>{{ $espacio->aeropuerto->costeOperacional * 1000 }}</td>
              <td><a class="vender" href="{{ route('espacios.vender', ['id' => $espacio->id]) }}"><i class="bx bx-money-withdraw"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


      
    </main>
  </div>
</body>
</html>