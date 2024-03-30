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
                <i class="bx bx-building"></i>
                <h3>Comprar Hangar</h3>
              </li>
              <li>
                <i class="bx bx-user-plus"></i>
                <h3>Contratar Ingenieros</h3>
              </li></a>
              <li>
                <i class="bx bx-trending-up"></i>
                <h3>Mejoras</h3>
              </li>
              <li>
                <i class="bx bx-trending-up"></i>
                <h3>Mejoras</h3>
              </li>
            </ul>
          </div>
    </main>
</body>
</html>