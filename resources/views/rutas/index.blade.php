@extends('master')

@section('content')
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
          <h1>{{ __('routes.routes') }}</h1>
        </div>
        <span class="boton" onclick="collapseAll()">
          <i class='bx bx-collapse-vertical' ></i>
          {{ __('routes.collapseAll') }}
        </span>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if (count($grupoRutas) > 0)
      @foreach ($grupoRutas as $rutas)
      <div class="tablas max-height">
        <div class="cabecera">
          <i class="bx bx-outline"></i>
          <h3>{{ __('routes.airplaneRoutes') }} {{ $rutas[0]->flota->matricula }} </h3>
          <i class='bx bx-chevron-up collapse-icon' onclick="collapseItem(this)"></i>
          @if ($rutas[0]->flota->estado == 0)
            <span class="rojo">{{ __('routes.inactive') }}</span>
          @elseif($rutas[0]->flota->estado == 2)
            <span class="rojo">{{ __('routes.maintenance') }}</span>
          @endif
          <div class="botones-tablas">
            @if ($rutas[0]->flota->estado == 0)
            <a href="{{ route('flota.activarRuta', ['id' => $rutas[0]->flota->id]) }}" class="boton">
              <i class="bx bx-check-square" ></i>
              <span>{{ __('routes.activateRoute') }}</span>
            </a>
            @endif
            <a href="{{ route('rutas.crearRutaAvion', ['id' => $rutas[0]->flota->id]) }}" class="boton">
              <i class="bx bx-add-to-queue"></i>
              <span>{{ __('routes.createRoute') }}</span>
            </a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('routes.airplane') }}</th>
              <th>{{ __('routes.departure') }}</th>
              <th>{{ __('routes.arrival') }}</th>
              <th>{{ __('routes.distance') }}</th>
              <th>{{ __('routes.time') }}</th>
              <th>{{ __('routes.timeOfDep') }}</th>
              <th>{{ __('routes.timeOfArr') }}</th>
              <th>{{ __('routes.ticketPrice') }}</th>
              <th>{{ __('routes.income') }}</th>
              <th>{{ __('routes.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rutas as $ruta)
            <tr>
              <td><i class="bx"><img src="{{ asset($ruta->flota->avion->img) }}" alt="{{ $ruta->flota->avion->modelo }}"></i></td>
              <td>{{ $ruta->espacio_departure->aeropuerto->icao }}</td>
              <td>{{ $ruta->espacio_arrival->aeropuerto->icao }}</td>
              <td>{{ $ruta->distancia }} km</td>
              <td>{{ $ruta->tiempoEstimado }}</td>
              <td>{{ $ruta->horaInicio }}</td>
              <td>{{ $ruta->horaFin }}</td>
              <td>{{ $ruta->precioBillete }}€</td>
              <td>
                @if (isset($economiaVuelos["$ruta->id"]) && count($economiaVuelos["$ruta->id"]) > 0)
                    @if ($economiaVuelos["$ruta->id"]['beneficio'] > 0)
                      <span class="verde">{{ number_format($economiaVuelos[$ruta->id]['beneficio'], 0, ',', '.') }}</span>
                    @elseif($economiaVuelos["$ruta->id"]['beneficio'] < 0)
                      <span class="rojo">{{ number_format($economiaVuelos[$ruta->id]['beneficio'], 0, ',', '.') }}</span>
                    @endif
                @else
                  n/a
                @endif
              </td>
              <td>
                <a class="vender tooltip" href="{{ route('rutas.borrarRuta', ['id' => $ruta->id]) }}">
                  <i class="bx bx-trash move-ef"></i>
                  <span class="tooltiptext">{{ __('routes.deleteRoute') }}</span>
                </a>
                <a class="modificar tooltip" data-modal-target="modalAvion{{ $ruta->id }}">
                  <i class="bx bx-wrench move-ef"></i>
                  <span class="tooltiptext">{{ __('routes.modifyRoute') }}</span>
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
            <h4>{{ __('routes.noRoutes') }}</h4>
          </div>
          <div class="mensaje info">
            <i class="bx bx-info-circle"></i>
            <h4>{{ __('routes.needHelp') }} <a href="{{ route('landing.tutorial') }}">{{ __('routes.needHelpT') }}</a></h4>
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
              <h2>{{ __('routes.modifyRoute') }}</h2>
            </div>
            <div class="cuerpo-modal">
              
              @csrf
              <label for="precioBillete">{{ __('routes.modifyTicketPrice') }}</label>
              <input type="range" name="precioBillete" id="precioBillete" class="precioBilletes" value="{{ $ruta->precioBillete }}" min="5" max="600" oninput="slide(this)">
              <p style="margin: 0 5px 0 0; padding: 0; display: inline-block;">{{ __('routes.price') }}</p>
              <span id="precio" class="precio"> {{ $ruta->precioBillete }} </span>
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">{{ __('routes.deny') }}</span>
                <input type="submit" class="aceptar" value="{{ __('routes.confirm') }}">
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
      <script>
        // Collapse tablas

        function collapseItem(elem){
          elem.parentElement.parentElement.classList.toggle('collapse')
          
          if(elem.style.transform != 'rotate(180deg)'){
            elem.style.transform = 'rotate(180deg)'
          } else {
            elem.style.transform = 'rotate(0deg)'
          }
        }

        function collapseAll(){
          let elements = document.getElementsByClassName("collapse-icon")
          
          for (var i = 0; i < elements.length; i++) {
            let element = elements[i]

            if(!element.parentElement.parentElement.classList.contains('collapse')){
              element.parentElement.parentElement.classList.add('collapse')

              if(element.style.transform != 'rotate(180deg)'){
                element.style.transform = 'rotate(180deg)'
              } else {
                element.style.transform = 'rotate(0deg)'
              }
            }
          }
          
        }


      </script>

    </main>
  </div>
@endsection()