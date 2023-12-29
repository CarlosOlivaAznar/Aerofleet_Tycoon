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
            <li><a href="index.html">Flota</a></li>
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
          <a href="#"><li>
            <i class="bx clogo"><img src="{{ asset('icons/boeing.svg') }}" alt=""></i>
            <h3>Boeing</h3>
          </li></a>
          <a href="#"><li>
            <i class="bx clogo"><img src="{{ asset('icons/embraer.png') }}" alt=""></i>
            <h3>Embraer</h3>
          </li></a>
          <a href="#"><li>
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
              <th>Fecha de Fabricacion</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img class="img-avion" src="../../images/a320_volotea.png">
              </td>
              <td>a320</td>
              <td>19-10-2023</td>
              <td>78%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/a350_airCaribes.png">
              </td>
              <td>a350</td>
              <td>19-10-2023</td>
              <td>85%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/737_aea.png">
              </td>
              <td>737-800</td>
              <td>19-10-2023</td>
              <td>61%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/a321_vueling.png">
              </td>
              <td>a321</td>
              <td>19-10-2023</td>
              <td>91%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/a320_vueling.png">
              </td>
              <td>a320</td>
              <td>19-10-2023</td>
              <td>100%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/737_ryanair.png">
              </td>
              <td>737-800</td>
              <td>19-10-2023</td>
              <td>42%</td>
            </tr>
            <tr>
              <td>
                <img class="img-avion" src="../../images/747_lufthansa.png">
              </td>
              <td>747-800</td>
              <td>19-10-2023</td>
              <td>81%</td>
            </tr>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>
@endauth()