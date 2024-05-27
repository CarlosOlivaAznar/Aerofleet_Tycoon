@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarFlota')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>Airbus</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('flota.index') }}">{{ __('fleet.fleet') }}</a></li>
            <li>/</li>
            <li><a href="{{ route('flota.comprarAviones') }}">{{ __('fleet.buyAircraft') }}</a></li>
            <li>/</li>
            <li><span>Airbus</span></li>
          </ul>
        </div>
      </div>

      <div class="tablas">
        <div class="cabecera">
          <h3>{{ __('fleet.airbus') }}</h3>
        </div>
        @include('partials.comprartable')
      </div>

    </main>
  </div>
</body>
</html>
@endauth()