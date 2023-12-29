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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img class="img-avion" src="{{ asset('images/new/airbus/a320neo.png') }}">
                      </td>
                      <td>a320</td>
                      <td>19-10-2023</td>
                      <td>78%</td>
                      <td>On Air</td>
                </tr>
                <tr>
                    <td>
                        <img class="img-avion" src="../../images/new/airbus/a320neo.png">
                      </td>
                      <td>a320</td>
                      <td>19-10-2023</td>
                      <td>78%</td>
                      <td>On Air</td>
                </tr>
                <tr>
                    <td>
                        <img class="img-avion" src="../../images/new/airbus/a320neo.png">
                      </td>
                      <td>a320</td>
                      <td>19-10-2023</td>
                      <td>78%</td>
                      <td>On Air</td>
                </tr>
                <tr>
                    <td>
                        <img class="img-avion" src="../../images/new/airbus/a320neo.png">
                      </td>
                      <td>a320</td>
                      <td>19-10-2023</td>
                      <td>78%</td>
                      <td>On Air</td>
                </tr>
                <tr>
                    <td>
                        <img class="img-avion" src="../../images/new/airbus/a320neo.png">
                      </td>
                      <td>a320</td>
                      <td>19-10-2023</td>
                      <td>78%</td>
                      <td>On Air</td>
                </tr>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
@endauth()