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
                <input type="text" name="nombreCompanyia" id="nombreCompanyia">
            </div>

            <div class="campos">
                <label for="sede">Localizacion de la sede</label>

                <input type="text" class="select" name="sede" id="sede" onfocus="mostrarDd()" onblur="ocultarDd()" onkeyup="filtrar()" placeholder="Busca la localizacion...">
                <input type="hidden" id="sedeHid" name="sedeHid" value="">
                
                <div class="drop-down" id="dropDown">
                  @foreach ($aeropuertos as $aeropuerto)
                      <p id="{{ $aeropuerto->id }}" onclick="seleccionar(this)">{{ $aeropuerto->nombre }}</p>
                  @endforeach
                </div>
            </div>

            <div class="campos">
              <input type="submit" value="Comenzar">
            </div>
        </div>
    </form>
    <script>
      function mostrarDd(){
        // Se muestra el dropDown
        document.getElementById("dropDown").classList.add("show");
        // Se ajusta el tamaño de los campos del buscador respecto al ancho del input
        document.getElementById("dropDown").style.width = String(document.getElementById("sede").offsetWidth) + "px"
      }

      function ocultarDd(){
        // Se retrasa la funcion para que deje tiempo para manejar el evento de onclick()
        setTimeout(function() {
          // Se oculta el dropDown
          document.getElementById("dropDown").classList.remove("show");
        }, 100);
      }

      function filtrar() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("sede");
        filter = input.value.toUpperCase();
        div = document.getElementById("dropDown");
        a = div.getElementsByTagName("p");
        for (i = 0; i < a.length; i++) {
          txtValue = a[i].textContent || a[i].innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
          } else {
            a[i].style.display = "none";
          }
        }
      }

      function seleccionar(element){
        let input = document.getElementById("sede")
        let inputHid = document.getElementById("sedeHid")

        input.value = element.innerHTML
        inputHid.value = element.getAttribute("id");

        ocultarDd();
        console.log(element);
      }
    </script>
  </main>
</body>
</html>
@endauth()