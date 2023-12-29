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
        <a href="comprarEspacios.html" class="boton">
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
            <tr>
              <td>LEBL</td>
              <td>Barcelona</td>
              <td>4</td>
              <td>5</td>
              <td>20.000 / 25.000 / 30.000</td>
              <td><i class="bx bx-plus"></i></td>
            </tr>
            <tr>
              <td>EGSS</td>
              <td>London Stansted</td>
              <td>1</td>
              <td>1</td>
              <td>10.000 / 15.000 / 20.000</td>
              <td><i class="bx bx-plus"></i></td>
            </tr>
            <tr>
              <td>LEMG</td>
              <td>Malaga</td>
              <td>1</td>
              <td>1</td>
              <td>7.000 / 13.000 / 17.000</td>
              <td><i class="bx bx-plus"></i></td>
            </tr>
            <tr>
              <td>LEAL</td>
              <td>Alicante</td>
              <td>1</td>
              <td>1</td>
              <td>11.000 / 16.000 / 19.000</td>
              <td><i class="bx bx-plus"></i></td>
            </tr>
          </tbody>
        </table>
      </div>


      
    </main>
  </div>
</body>
</html>