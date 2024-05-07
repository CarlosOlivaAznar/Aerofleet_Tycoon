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
          <h1>{{ __('competence.routesOf') }} {{ $nombreC }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('competencia.index') }}">{{ __('competence.competence') }}</a></li>
            <li>/</li>
            <li><span>{{ __('competence.routesOf') }} {{ $nombreC }}</span></li>
          </ul>
        </div>
      </div>

      @if (count($grupoRutas) > 0)
      @foreach ($grupoRutas as $rutas)
      <div class="tablas">
        <div class="cabecera">
          <i class="bx bx-outline"></i>
          <h3>{{ __('competence.planeRoutes') }} {{ $rutas[0]->flota->matricula }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('competence.plane') }}</th>
              <th>{{ __('competence.licence') }}</th>
              <th>{{ __('competence.departure') }}</th>
              <th>{{ __('competence.arrival') }}</th>
              <th>{{ __('competence.distance') }}</th>
              <th>{{ __('competence.time') }}</th>
              <th>{{ __('competence.timeDep') }}</th>
              <th>{{ __('competence.timeArr') }}</th>
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
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endforeach  
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>El usuario seleccionado no tiene ninguna ruta creada</h4>
          </div>
      @endif

    </main>
  </div>
</body>
</html>