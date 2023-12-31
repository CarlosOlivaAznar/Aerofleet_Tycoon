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
              <th>Espacios Ocupados</th>
              <th>Espacios Disponibles</th>
              <th>Coste por Operacion</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($espacios as $espacio)
            <tr>
              <td>{{ $espacio->aeropuerto->icao }}</td>
              <td>{{ $espacio->aeropuerto->nombre }}</td>
              <td>4 (inop)</td>
              <td>{{ $espacio->numeroDeEspacios }} (inop)</td>
              <td>{{ $espacio->aeropuerto->costeOperacional1 }} / {{ $espacio->aeropuerto->costeOperacional2 }} / {{ $espacio->aeropuerto->costeOperacional3 }}</td>
              <td><i class="bx bx-plus"></i>(inop)</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


      
    </main>
  </div>
</body>
</html>