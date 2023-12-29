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
            <tr>
                <td>
                    <img src="../../images/new/airbus/a300.png" alt="">
                </td>
                <td>a300</td>
                <td>26.000.000€</td>
                <td>2500mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a310.png" alt="">
                </td>
                <td>a310</td>
                <td>35.000.000€</td>
                <td>3000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a320.png" alt="">
                </td>
                <td>a320</td>
                <td>45.000.000€</td>
                <td>1500mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a320WL.png" alt="">
                </td>
                <td>a320WL</td>
                <td>50.000.000€</td>
                <td>1600mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a320neo.png" alt="">
                </td>
                <td>a320neo</td>
                <td>70.000.000€</td>
                <td>1900mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a220.png" alt="">
                </td>
                <td>a220</td>
                <td>40.000.000€</td>
                <td>2000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a321.png" alt="">
                </td>
                <td>a321</td>
                <td>75.000.000€</td>
                <td>1700mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a321neo.png" alt="">
                </td>
                <td>a321neo</td>
                <td>80.000.000€</td>
                <td>2000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a330-200.png" alt="">
                </td>
                <td>a330-200</td>
                <td>95.000.000€</td>
                <td>3500mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a330-300.png" alt="">
                </td>
                <td>a330-300</td>
                <td>93.000.000€</td>
                <td>3300mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a340-300.png" alt="">
                </td>
                <td>a340-300</td>
                <td>105.000.000€</td>
                <td>3600mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a340-600.png" alt="">
                </td>
                <td>a340-600</td>
                <td>115.000.000€</td>
                <td>3800mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a350.png" alt="">
                </td>
                <td>a350</td>
                <td>140.000.000€</td>
                <td>4000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a380.png" alt="">
                </td>
                <td>a380</td>
                <td>240.000.000€</td>
                <td>7000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
            <tr>
                <td>
                    <img src="../../images/new/airbus/a3st.png" alt="">
                </td>
                <td>Beluga</td>
                <td>220.000.000€</td>
                <td>4000mn</td>
                <td><i class="bx bx-shopping-bag"></i></td>
            </tr>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>
@endauth()