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
          <h1>{{ __('competence.rankings') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('competencia.index') }}">{{ __('competence.competence') }}</a></li>
            <li>/</li>
            <li><span>{{ __('competence.rankings') }}</span></li>
          </ul>
        </div>
      </div>

      @if(count($usuarios) > 0)
      <div class="tablas">
        <div class="cabecera">
            <i class="bx bxs-bank"></i>
            <h3>{{ __('competence.totalAssets') }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>{{ __('competence.airlineName') }}</th>
                    <th>{{ __('competence.airplanes') }}</th>
                    <th>{{ __('competence.slots') }}</th>
                    <th>{{ __('competence.hangars') }}</th>
                    <th>{{ __('competence.totalAssets') }}</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $usuario)
              <tr>
                <th>{{ $loop->index + 1 }}.</th>
                <td>{{ $usuario->nombreCompanyia }}</td>
                <td>{{ count($usuario->flota) }}</td>
                <td>{{ $usuario->getNumEspacios() }}</td>
                <td>{{ count($usuario->sede->hangar) }}</td>
                <td><span class="bold">{{ number_format($usuario->patrimonio(), 0, ',', '.') }} €</span></td>
              </tr> 
              @endforeach
            </tbody>
        </table>
      </div>
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('competence.noUsers') }}</h4>
          </div>
      @endif

    </main>
  </div>
</body>
</html>