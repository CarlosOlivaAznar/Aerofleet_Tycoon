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

      
    </main>
  </div>
</body>
</html>