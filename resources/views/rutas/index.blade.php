<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarRutas')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Rutas</h1>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if (count($grupoRutas) > 0)
      @foreach ($grupoRutas as $rutas)
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-outline"></i>
          <h3>Rutas del avion {{ $rutas[0]->flota->matricula }}</h3>
          @if ($rutas[0]->flota->estado == 0)
            <span class="rojo">RUTA INACTIVA</span>
          @elseif($rutas[0]->flota->estado == 2)
            <span class="rojo">AVION EN MANTENIMIENTO</span>
          @endif
          <div class="botones-tablas">
            @if ($rutas[0]->flota->estado == 0)
            <a href="{{ route('flota.activarRuta', ['id' => $rutas[0]->flota->id]) }}" class="boton">
              <i class="bx bx-check-square" ></i>
              <span>Activar ruta</span>
            </a>
            @endif
            <a href="{{ route('rutas.crearRutaAvion', ['id' => $rutas[0]->flota->id]) }}" class="boton">
              <i class="bx bx-add-to-queue"></i>
              <span>Crear ruta</span>
            </a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>Avion</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Distancia</th>
              <th>Tiempo</th>
              <th>Hora de salida</th>
              <th>Hora de llegada</th>
              <th>Precio Billete</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rutas as $ruta)
            <tr>
              <td><i class="bx"><img src="{{ asset($ruta->flota->avion->img) }}" alt=""></i></td>
              <td>{{ $ruta->espacio_departure->aeropuerto->icao }}</td>
              <td>{{ $ruta->espacio_arrival->aeropuerto->icao }}</td>
              <td>{{ $ruta->distancia }}km</td>
              <td>{{ $ruta->tiempoEstimado }}</td>
              <td>{{ $ruta->horaInicio }}</td>
              <td>{{ $ruta->horaFin }}</td>
              <td>{{ $ruta->precioBillete }}€</td>
              <td>
                <a class="vender tooltip" href="{{ route('rutas.borrarRuta', ['id' => $ruta->id]) }}">
                  <i class="bx bx-trash"></i>
                  <span class="tooltiptext">Eliminar Ruta</span>
                </a>
                <a class="modificar tooltip" data-modal-target="modalAvion{{ $ruta->id }}">
                  <i class="bx bx-wrench"></i>
                  <span class="tooltiptext">Modificar Ruta</span>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endforeach  
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>No hay rutas creadas</h4>
          </div>
          <div class="mensaje info">
            <i class="bx bx-info-circle"></i>
            <h4>necesitas ayuda? visita nuestra pagina de <a href="{{ route('landing.tutorial') }}">tutorial</a></h4>
          </div>
      @endif

      
      <!-- Modales por cada avion -->
      @foreach ($grupoRutas as $rutas)
      @foreach ($rutas as $ruta)
      <div class="modal" id="modalAvion{{ $ruta->id }}">
        <div class="contenido-modal">
          <form action="{{ route('rutas.modificar', ['id' => $ruta->id]) }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>Modificar Ruta</h2>
            </div>
            <div class="cuerpo-modal">
              
              @csrf
              <label for="precioBillete">Modificar precio billete:</label>
              <input type="range" name="precioBillete" id="precioBillete" class="precioBilletes" value="{{ $ruta->precioBillete }}" min="5" max="600" oninput="slide(this)">
              <p style="margin: 0 5px 0 0; padding: 0; display: inline-block;">Precio: </p>
              <span id="precio" class="precio"> {{ $ruta->precioBillete }} </span>
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">Cancelar Cambios</span>
                <input type="submit" class="aceptar" value="Confirmar Cambios">
              </div>
            </div>
          </form>
        </div>
      </div> 
      @endforeach  
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>
      <script>

        function slide(event){
          var precio = event.nextElementSibling.nextElementSibling;
          precio.innerHTML = event.value
        }
  
      </script>

    </main>
  </div>
</body>
</html>