<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main>
    <div class="errores">
        <img src="{{ asset('images/errors/401.png') }}" alt="error 401">
        <h2>{{ $exception->getMessage() }}</h2>
        <a href="{{ route('landing.landing') }}" class="boton">
            <i class="bx bx-arrow-back"></i>Volver al inicio
        </a>
    </div>
  </main>
</body>
</html>