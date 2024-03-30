<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/estilos.css">
  <title>AeroFleet</title>
</head>
<body>
    <nav class="barra-login">
        <a href="#" class="titulo-pag">
            <i class="bx bx-paper-plane" ></i>
            <div class="titulo-nombre">Aero<span>Fleet</span></div>
        </a>
        <div class="login">
            <div><a href="{{ route('login') }}">Acceder</a></div>
            <div><a href="{{ route('register') }}">Resgistrarse</a></div>
        </div>
    </nav>
    <img class="imagenTitulo" src="{{ asset('images/horarios.jpg') }}" alt="horariosAvion">
    <main class="mainContent">
        <h1>AEROFLEET TYCOON</h1>
        <h2>Simulador de Gestion a Tiempo real</h2>
        <div class="resumen">
            <ul>
              <li>
                <i class="bx bx-stats"></i>
                <h3>Demanda</h3>
                <h4>Cada aeropuerto tiene su propia demanda y pasajeros simulados segun el destino y origen de la ruta</h4>
              </li>
              <li>
                <i class="bx bx-group"></i>
                <h3>Multijugador</h3>
                <h4>El mundo en el que se gestiona tu compañia aerea esta en constante competencia con el resto de jugadores de la aplicacion, afectando a la demanda de tus vuelos y tus ingresos</h4>
              </li></a>
              <li>
                <i class="bx bxs-badge-dollar"></i>
                <h3>Gratuito</h3>
                <h4>Este proyecto esta hecho con el fin de ser 100% gratuito sin anuncios ni microtransacciones o mecanicas pay to win. El proyecto esta financiado completamente a base de donaciones de los usuarios</h4>
              </li>
              <li>
                <i class="bx bx-network-chart"></i>
                <h3>Monopolio</h3>
                <h4>Emplea tecnicas no eticas sobre otros jugadores para ser la compañia aerea mejor valorada (como en el mundo real vamos)</h4>
              </li>
            </ul>
          </div>
          <div class="imagenConTexto" style="background-image: url('{{ asset('images/emiratesFondo.jpg') }}');">
            <h3>COMIENZA AQUI TU COMPAÑIA AEREA</h3>
            <a href="{{ route('register') }}">Registrarse</a>
          </div>
    </main>

    <footer>
      <div class="contenidoFooter">
        <div class="izquierda">
          <div class="imagen-texto">
            <img src="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" alt="">
            <h4>Aerofleet Tycoon</h4>
          </div>
          <p class="autor">Desarrollado por Carlos Oliva Aznar</p>
        </div>
        <div>
          <p class="titulo">Sobre Mi</p>
          <p class="texto"><a href="">¿Quien soy?</a></p>
          <p class="texto"><a href="">Blog</a></p>
          <p class="texto"><a href="">Contactame</a></p>
        </div>
        <div>
          <p class="titulo">FAQ</p>
          <p class="texto"><a href="">Donar</a></p>
          <p class="texto"><a href="">Preguntas Frecuentes</a></p>
          <p class="texto"><a href="">Reportar un fallo</a></p>
        </div>
        <div class="derecha">
          <p class="titulo">Informacion Adicional</p>
          <p class="texto"><a href="">Terminos de uso</a></p>
          <p class="texto"><a href="">Politica de Privacidad</a></p>
          <p class="texto"><a href="">Roadmap</a></p>
        </div>
      </div>
    </footer>
</body>
</html>