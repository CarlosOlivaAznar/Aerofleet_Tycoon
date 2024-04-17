<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarCompetencia')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Demanda Ruta </h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('competencia.index') }}">Competencia</a></li>
            <li>/</li>
            <li><span>Demanda Ruta</span></li>
          </ul>
        </div>
      </div>
      
      @if (count($grupoRutas) > 0)
      @foreach ($grupoRutas as $rutas)
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-outline"></i>
          <h3>Rutas del la compañia {{ $rutas[0]->user->nombreCompanyia }}</h3>
          @if ($rutas[0]->flota->estado == 0 || $rutas[0]->flota->estado == 2)
              <span class="rojo">RUTA INACTIVA</span>
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
              <th>Matricula</th>
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
              <td>{{ $ruta->flota->matricula }}</td>
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
            <h4>No existen rutas creadas con los parametros elegidos</h4>
          </div>
      @endif

      
    </main>
  </div>
</body>
</html>