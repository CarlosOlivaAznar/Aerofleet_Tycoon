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
      <div class="cabecera pagina">
        <div class="titulo">
          <h1>Flota</h1>
        </div>
        <a href="{{ route('flota.comprarAviones') }}" class="boton">
            <i class="bx bx-shopping-bag"></i>
            <span>Comprar Aviones</span>
        </a>
      </div>


      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($flota) > 0)
      <div class="tablas">
        <div class="cabecera">
            <i class="bx bxs-plane-alt"></i>
            <h3>Aviones en Propiedad</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Avion</th>
                    <th>Matricula</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Fecha de Fabricacion</th>
                    <th>Condicion</th>
                    <th class="center">Estado</th>
                    <th>Precio de Venta</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($flota as $avion)
              <tr>
                <td>
                  <img class="img-avion" src="{{ asset($avion->avion->img) }}">
                </td>
                <td>{{ $avion->matricula }}</td>
                <td>{{ $avion->avion->modelo }}</td>
                <td>{{ $avion->avion->capacidad }}</td>
                <td>{{ $avion->fechaDeFabricacion }}</td>
                <td>{{ $avion->condicion }}%</td>
                <td class="estado">
                  <span class="{{ $avion->estatusC() }}">{{ $avion->estatusS() }}</span>
                </td>
                <td>{{ number_format($avion->precioVenta(), 0, ',', '.') }}</td>
                <td>
                  <a class="vender tooltip" data-modal-target="modalVender{{ $avion->id }}">
                    <i class="bx bx-money-withdraw"></i>
                    <span class="tooltiptext">Vender Avion</span>
                  </a>
                  <a class="modificar tooltip" data-modal-target="modalMantenimiento{{ $avion->id }}">
                    <i class="bx bx-wrench"></i>
                    <span class="tooltiptext">Realizar Mantenimiento</span>
                  </a>
                  <a class="comprar tooltip" href="{{ route('rutas.crearRutaAvion', ['id' => $avion->id]) }}">
                    <i class="bx bx-add-to-queue"></i>
                    <span class="tooltiptext">Crear Ruta</span>
                  </a>
                </td>
              </tr> 
              @endforeach
            </tbody>
        </table>
      </div>
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>No tienes ningun avion en tu propiedad</h4>
          </div>
      @endif

      <!-- Modales -->
      @foreach ($flota as $avion)
      <!-- Mantenimiento -->
      <div class="modal" id="modalMantenimiento{{ $avion->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Mantenimiento Avion</h2>
          </div>
          <div class="cuerpo-modal">

            <p>¿Esta seguro que quiere enviar el avion a mantenimiento?</p><br>
            <p>El avion se estacionara en los hangares de su sede y se realizaran los mantenimientos</p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="{{ route('flota.mantenimiento', ["id" => $avion->id]) }}" class="aceptar">Confirmar</a>
            </div>
          </div>
        </div>
      </div> 

      <!-- Vender -->
      <div class="modal" id="modalVender{{ $avion->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Vender Avion</h2>
          </div>
          <div class="cuerpo-modal">

            <p>¿Esta seguro que quiere vender este avion?</p><br>
            <p>El avion se vendera por 
            <span class="verde">{{number_format($avion->precioVenta(), 0, ',', '.')}}€</span></p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">Denegar</span>
              <a href="{{ route('flota.vender', ["id" => $avion->id]) }}" class="aceptar">Confirmar</a>
            </div>
          </div>
        </div>
      </div> 
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
</body>
</html>
@endauth()