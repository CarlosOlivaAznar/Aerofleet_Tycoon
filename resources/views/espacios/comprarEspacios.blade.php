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
          <h1>Comprar Espacios</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('espacios.index') }}">Espacios</a></li>
            <li>/</li>
            <li><span>Comprar Espacios</span></li>
          </ul>
        </div>
      </div>

      <div class="rutas">
        <form action="{{ route('espacios.comprar') }}" method="POST">
          @csrf
          <div class="divRepartido">
            <div class="input">
              <h3>Selecciona un Aeropuerto</h3>
              <select name="aeropuerto" id="aeropuerto" onclick="mostrarPrecio()">
                @foreach ($aeropuertos as $aeropuerto)
                <option value="{{ $aeropuerto->icao }}">{{ $aeropuerto->icao }}, {{ $aeropuerto->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="input">
              <h3>Precio</h3>
              <p id="costeOperacion"></p>
            </div>
            <div class="input">
              <h3>Espacios a comprar</h3>
              <input type="number" name="espacios" min="1" id="espacios" onkeyup="mostrarPrecioTotal()" onchange="mostrarPrecioTotal()">
            </div>
            <div class="input">
              <h3>Precio Total:</h3>
              <p id="precioTotal"></p>
            </div>
            <div class="input submit">
              <input type="submit" value="Comprar Espacios" id="comprarEspacios">
            </div>
          </div>
          <!-- Precios de los espacios -->
          @foreach ($aeropuertos as $aeropuerto)
          <input type="hidden" id="{{ $aeropuerto->icao }}" value="{{ $aeropuerto->costeOperacional }}">
          @endforeach

        </form>
      </div>
      <script>
        // Al iniciar la pagina muestra el precio ya
        mostrarPrecio();

        function mostrarPrecio()
        {
          var icao = document.getElementById("aeropuerto").value;
          var costeOperacion = parseInt(document.getElementById(icao).value);
          var mostrarPrecio = document.getElementById("costeOperacion");

          // Mostrar precio en el parrafo
          mostrarPrecio.innerHTML = costeOperacion;

          // Reseteamos el precio total
          mostrarPrecioTotal();
        }

        function mostrarPrecioTotal()
        {
          // Mostrar precio segun los espacios
          var numEspacios = parseInt(document.getElementById("espacios").value);
          var precioTotal = document.getElementById("precioTotal");
          console.log(numEspacios);
          if(!isNaN(numEspacios)){
          // CosteOperacion para hacer el calculo
          var icao = document.getElementById("aeropuerto").value;
          var costeOperacion = parseInt(document.getElementById(icao).value);

          precioTotal.innerHTML = costeOperacion * numEspacios
          } else {
            precioTotal.innerHTML = 0;
          }
        }
      </script>
    </main>
  </div>
</body>
</html>