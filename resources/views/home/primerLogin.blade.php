@auth()
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main  class="mainContent">
    
    <form action="{{ route('home.submit') }}" method="POST" autocomplete="off">
        @csrf
        <div class="formulario">
            <h1>Introduce los datos de tu nueva compañia aérea</h1>

            <div class="campos">
                <label for="nombreCompanyia">Nombre de la compañia aérea:</label>
                <input type="text" name="nombreCompanyia" id="nombreCompanyia" required>
            </div>

            <div class="campos">
                <label for="sede">Localizacion de la sede</label>

                <input type="text" class="select" name="sede" id="sede" onfocus="mostrarDd('dropDown')" onblur="ocultarDd('dropDown')" onkeyup="filtrar(this, 'dropDown')" placeholder="Busca la localizacion...">
                <input type="hidden" id="sedeHid" name="sedeHid" value="">
                
                <div class="drop-down" id="dropDown">
                  @foreach ($aeropuertos as $aeropuerto)
                      <p id="{{ $aeropuerto->id }}" onclick="seleccionar(this, 'sede', 'sedeHid')">{{ $aeropuerto->nombre }}</p>
                  @endforeach
                </div>
            </div>

            <div class="campos">
              <input type="submit" value="Comenzar">
            </div>
        </div>
    </form>
    <script src="{{ asset('js/dropdown.js') }}"></script>
  </main>
</body>
</html>
@endauth()