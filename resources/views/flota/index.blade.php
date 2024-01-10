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
          <h1>Flota</h1>
        </div>
        <a href="{{ route('flota.comprarAviones') }}" class="boton">
            <i class="bx bx-shopping-bag"></i>
            <span>Comprar Aviones</span>
        </a>
      </div>


      <!-- Alertas -->
      @include('partials.alertas')

      <div class="tablas">
        <div class="cabecera">
            <i class="bx bxs-plane-alt"></i>
            <h3>Aviones en Propiedad</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Avion</th>
                    <th>Modelo</th>
                    <th>Fecha de Fabricacion</th>
                    <th>Estado</th>
                    <th>Status</th>
                    <th>Precio de Venta</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($flota as $avion)
              <tr>
                <td>
                  <img class="img-avion" src="{{ asset($avion->avion->img) }}">
                </td>
                <td>{{ $avion->avion->modelo }}</td>
                <td>{{ $avion->fechaDeFabricacion }}</td>
                <td>{{ $avion->condicion }}%</td>
                <td>{{ $avion->estado }}</td>
                <td>{{ number_format($avion->avion->precio * ($avion->condicion / 100), 0, ',', '.') }}</td>
                <td>
                  <a class="vender" href="{{ route('flota.vender', ['id' => $avion->id]) }}"><i class="bx bx-money-withdraw"></i></a>
                  <a class="comprar" href="{{ route('rutas.crearRutaAvion', ['id' => $avion->id]) }}"><i class="bx bx-add-to-queue"></i></a>
                </td>
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