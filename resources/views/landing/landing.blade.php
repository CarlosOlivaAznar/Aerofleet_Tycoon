<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <img class="imagenTitulo" src="{{ asset('images/horarios2.jpg') }}" alt="horariosAvion">
    <main class="mainContent">
        <div class="nombre-logo">
          <img src="{{ asset('images/logos/logo_AFT_icon.png') }}" alt="logo">
          <h1>AeroFleet Tycoon</h1>
        </div>
        <h2 class="subtituloPagina">{{ __('landing.realTimeSim') }}</h2>
        <div class="resumen">
            <ul>
              <li>
                <i class="bx bx-stats"></i>
                <h3>{{ __('landing.demand') }}</h3>
                <h4>{{ __('landing.demandTxt') }}</h4>
              </li>
              <li>
                <i class="bx bx-group"></i>
                <h3>{{ __('landing.multiplayer') }}</h3>
                <h4>{{ __('landing.multiplayerTxt') }}</h4>
              </li></a>
              <li>
                <i class="bx bxs-badge-dollar"></i>
                <h3>{{ __('landing.free') }}</h3>
                <h4>{{ __('landing.freeTxt') }}</h4>
              </li>
              <li>
                <i class="bx bx-network-chart"></i>
                <h3>{{ __('landing.monopoly') }}</h3>
                <h4>{{ __('landing.monopolyTxt') }}</h4>
              </li>
            </ul>
          </div>
          <div class="imagenConTexto" style="background-image: url('{{ asset('images/emiratesFondo.jpg') }}');">
            <h3>{{ __('landing.start') }}</h3>
            <a href="{{ route('register') }}">{{ __('landing.register') }}</a>
          </div>

          <div class="changelog collapse">
            <h3>{{ __('landing.changelog') }}</h3>
            <hr>

            <div class="collapse-content" id="collapse-content">
              <h4>V-0.3.1</h4>
              <ul>
                <li>Pagina del tutorial adaptada a moviles</li>
                <li>En comprar espacios ahora tiene un buscador</li>
                <li>Arreglado un error donde podrias comprar 0 espacios</li>
                <li>Ahora puedes cambiar tu nombre de la compañia desde la pagina sede</li>
                <li>Ahora se muestra el codigo ICAO en crear ruta</li>
              </ul>

              <h4>V-0.3.0</h4>
              <ul>
                <li>Ahora los espacios de los aeropuertos son limitados y solo se pueden comprar un numero maximo entre todos los jugadores</li>
                <li>Añadidos las marcas de Embraer y Bombardier</li>
                <li>Añadido nuevos modelos de aviones de Airbus y Boeing</li>
                <li>Paginas de login adaptadas a dispositivos moviles</li>
                <li>Añadido la pagina de competencia</li>
                <li>Añadido tooltips en los botones que no tienen texto</li>
                <li>Añadido la capacidad del avion en Flota</li>
                <li>Paginas adaptadas a movil</li>
                <li>Añadido el estado de las rutas En tierra/En ruta/En mantenimiento</li>
                <li>Al crear la ruta te muestra las opciones de los espacios que tienes disponibles</li>
                <li>Añadido a la pagina home mensajes de alerta y mensajes de informacion de las rutas</li>
                <li>Añadido un mapa en comprar espacios con la informacion de los aeropuertos disponibles</li>
              </ul>

              <h4>V-0.2.0</h4>
              <ul>
                <li>Los vuelos de larga distancia ahora tienen un plus por distancia</li>
                <li>El mapa muestra los datos de los aviones, rutas y aeropuertos</li>
                <li>Ahora se puede modificar el precio de los billetes</li>
                <li>Las rutas se muestran en grupo y dividido por aviones</li>
                <li>Los aviones se pueden mandar a mantenimiento</li>
                <li>Las tablas se pueden ver ahora en dispositivos moviles</li>
                <li>Las matriculas de los aviones se generan automaticamente</li>
              </ul>
            </div>
            <div class="button" id="changelogButton">
              <p>{{ __('landing.showMore') }}</p>
              <i class="bx bx-chevron-down"></i>
            </div>
            <input type="hidden" name="showMore" id="showMore" value="{{ __('landing.showMore') }}">
            <input type="hidden" name="showLess" id="showLess" value="{{ __('landing.showLess') }}">
          </div>
    </main>

    <script>
      // Mostrar contenido changelog
      let boton = document.getElementById('changelogButton');
      let contenido = document.getElementById('collapse-content');

      let mostrarMas = document.getElementById('showMore').value;
      let mostrarMenos = document.getElementById('showLess').value;
      
      boton.addEventListener("click", function() {
        if(contenido.getAttribute('class') === 'collapse-content'){
          contenido.setAttribute("class", "collapse-content expand");

          // Cambiar texto y propiedades
          boton.childNodes[1].innerHTML = mostrarMenos;
          boton.childNodes[3].setAttribute("class", "bx bx-chevron-up");
        } else {
          contenido.setAttribute("class", "collapse-content");

          // Cambiar texto y propiedades
          boton.childNodes[1].innerHTML = mostrarMas;
          boton.childNodes[3].setAttribute("class", "bx bx-chevron-down");
        }
      });
    </script>

    @include('partials.footer')
</body>
</html>