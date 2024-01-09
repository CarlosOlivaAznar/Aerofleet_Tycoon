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
              <select name="aeropuerto" id="aeropuerto">
                @foreach ($aeropuertos as $aeropuerto)
                <option value="{{ $aeropuerto->icao }}">{{ $aeropuerto->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="input">
              <h3>Espacios a comprar</h3>
              <input type="number" name="espacios" min="1">
            </div>
            <div class="input submit">
              <input type="submit" value="Comprar Espacios" id="comprarEspacios">
            </div>
          </div>
        </form>
      </div>

      
    </main>
  </div>
</body>
</html>