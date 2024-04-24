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
          <h1>Comprar Aviones</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('flota.index') }}">Flota</a></li>
            <li>/</li>
            <li><span>Comprar Aviones</span></li>
          </ul>
        </div>
      </div>

      <div class="resumen">
        <ul>
          <a href="{{ route('flota.comprarAirbus') }}"><li>
            <i class="bx clogo"><img src="{{ asset('icons/airbus.svg') }}" alt=""></i>
            <h3>Airbus</h3>
          </li></a>
          <a href="{{ route('flota.comprarBoeing') }}"><li>
            <i class="bx clogo"><img src="{{ asset('icons/boeing.svg') }}" alt=""></i>
            <h3>Boeing</h3>
          </li></a>
          <a href="{{ route('flota.comprarEmbraer') }}"><li>
            <i class="bx clogo"><img src="{{ asset('icons/embraer.png') }}" alt=""></i>
            <h3>Embraer</h3>
          </li></a>
          <a href="{{ route('flota.comprarBombardier') }}"><li>
            <i class="bx clogo"><img src="{{ asset('icons/bombardier.svg') }}" alt=""></i>
            <h3>Bombardier</h3>
          </li></a>
        </ul>
      </div>

      <div class="tablas">
        <div class="cabecera">
          <i class="bx bxs-plane-take-off"></i>
          <h3>Aviones de Segunda Mano</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Modelo</th>
              <th>Compañia</th>
              <th>Fecha de Fabricacion</th>
              <th>Estado</th>
              <th>Precio</th>
              <th>Comprar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($avionessh as $avionsh)
            <tr>
              <td>
                <img class="img-avion" src="{{ asset($avionsh->img) }}">
              </td>
              <td>{{ $avionsh->avion->modelo }}</td>
              <td>{{ $avionsh->companyia }}</td>
              <td>{{ $avionsh->fechaDeFabricacion }}</td>
              <td>{{ $avionsh->condicion }}%</td>
              <td>{{ number_format($avionsh->avion->precio * ($avionsh->condicion / 100), 0, ',', '.') }}</td>
              <td><a class="comprar tooltip" href="{{ route('flota.comprarSegundaMano', ['id' => $avionsh->id]) }}">
                <i class="bx bx-shopping-bag"></i>
                <span class="tooltiptext">Comprar Avion</span>
              </a></td>
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