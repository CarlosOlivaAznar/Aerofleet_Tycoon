@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarHome')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Home</h1>
        </div>
      </div>

      <div class="resumen">
        <ul>
          <li>
            <i class="bx bx-money"></i>
            <div>
              <h3>{{ session('saldo') }}</h3>
              <h4>Efectivo disponible</h4>
            </div>
          </li>
          <li>
            <i class="bx bx-compass"></i>
            <div>
              <h3>{{ count($user->ruta) }}</h3>
              <h4>Rutas Activas</h4>
            </div>
          </li>
          <li>
            <i class="bx bxs-plane-alt"></i>
            <div>
              <h3>{{ count($user->flota) }}</h3>
              <h4>Aviones comprados</h4>
            </div>
          </li>
          <li>
            <i class="bx bx-building-house"></i>
            <div>
              <h3>{{ count($user->espacio) }}</h3>
              <h4>Diferentes aeropuertos</h4>
            </div>
          </li>
        </ul>
      </div>


      <div class="informacion">
        <div class="basico">
          <h3>Saldo</h3>
          <canvas id="beneficiosChart"></canvas>
        </div>
        <div class="basico">
          <h3>Mensajes</h3>
          <div class="notificaciones">
            @if (count($mensajeVuelos) > 0)
            <ul>
              @foreach ($mensajeVuelos as $mensaje)
                @if ($mensaje[1] === 1)
                  <li class="exito">
                    <i class="bx bx-check-circle"></i>
                @elseif($mensaje[1] === 2)
                  <li class="warning">
                    <i class="bx bx-error"></i>
                @elseif($mensaje[1] === 3)
                  <li class="error">
                    <i class="bx bx-error"></i>
                @else
                  <li>
                @endif
                <p>{{ $mensaje[0] }}</p>
              </li>
              @endforeach
            </ul>
            @else
                No hay mensajes disponibles
            @endif
          </div>
        </div>
      </div>

      <div class="infoBasico">
        <h3>Informacion de los vuelos</h3>
        <div>
          @if (count($infoAviones) > 0)
          <ul>
            @foreach ($infoAviones as $info)
            <li>{{ $info }}</li>
            @endforeach
          </ul>
          @else
            No hay informacion
          @endif
        </div>
      </div>


      @foreach ($beneficios as $benficio)
        <input type="hidden" class="beneficiosUsuario" value="{{ $benficio }}">
      @endforeach

      @foreach ($fechas as $fecha)
        <input type="hidden" class="fechaUsuario" value="{{ $fecha }}">
      @endforeach


      <!-- Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        const ctx = document.getElementById('beneficiosChart');

        var beneficiosDom = document.getElementsByClassName('beneficiosUsuario');
        var fechasDom = document.getElementsByClassName('fechaUsuario');

        var beneficios = Array();
        var fechas = Array();

        for(var i = 0; i < beneficiosDom.length; i++){
          beneficios.push(beneficiosDom[i].value);
          fechas.push(fechasDom[i].value);
        }

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: fechas,
            datasets: [{
              label: 'Saldo',
              data: beneficios,
              borderWidth: 2
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
      
    </main>
  </div>
</body>
</html>
@endauth()