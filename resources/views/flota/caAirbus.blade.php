@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarFlota')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Airbus</h1>
          <ul class="breadcrumb">
            <li><a href="index.html">Flota</a></li>
            <li>/</li>
            <li><a href="comprarAviones.html">Comprar Aviones</a></li>
            <li>/</li>
            <li><span>Airbus</span></li>
          </ul>
        </div>
      </div>

      <div class="tablas">
        <div class="cabecera">
          <h3>Aviones Airbus</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Modelo</th>
              <th>Precio</th>
              <th>Rango</th>
              <th>Comprar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($aviones as $avion)
            <tr>
                <td>
                    <img src="{{ asset($avion->img) }}" alt="">
                </td>
                <td>{{ $avion->modelo }}</td>
                <td>{{ $avion->precio }}</td>
                <td>{{ $avion->rango }}km</td>
                <td><a href="{{ route('flota.comprar', ['id' => $avion->id]) }}"><i class="bx bx-shopping-bag"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>
@endauth()