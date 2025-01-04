@extends('master')

@section('content')
  <!-- Menu Lateral -->
  @include('partials.sidebarEconomia')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('economy.shares') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.shares') }}</span></li>
          </ul>
        </div>
      </div>

      <div class="informacion">
        <div class="infodatos patrimonio">
            <h3>{{ __('economy.airlineValue') }}</h3>
            <canvas class="canvas" id="patrimonioChart"></canvas>
        </div>
        <div class="infodatos">
          <h3>{{ __('economy.ownershipStake') }}</h3>
          <canvas id="posesionEmpresa"></canvas>
        </div>
      </div>

      <div class="resumen">
        <ul>
            <a href="{{ route('economia.comprarAcciones', ['id' => 1]) }}">
                <li class="move-xy">
                    <i class='bx bx-coin-stack'></i>
                    <h3>{{ __('economy.buyShares') }}</h3>
                </li>
            </a>
            <a data-modal-target="modalVenderCompanyia">
                <li class="move-xy">
                    <i class='bx bx-money'></i>
                    <h3>{{ __('economy.sellShares') }}</h3>
                </li>
            </a>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($acciones) > 0)
      <div class="tablas">
        <div class="cabecera">
            <i class='bx bx-coin-stack'></i>
            <h3>{{ __('economy.yourShares') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>Aerolinea</th>
              <th>Porcentaje en propiedad</th>
              <th>Valor actual desde la compra</th>
              <th>Beneficios obtenidos</th>
              <th>Vender</th>
            </tr>
          </thead>
          <tbody>
            @foreach($acciones as $accion)
            <tr>
                <td>{{ $accion->sede->user->nombreCompanyia }}</td>
                <td>{{ $accion->accionesCompradas * 100 }}%</td>
                <td>
                  @if ($accion->valorAccion() >= 0)
                      <span class="verde">+{{ $accion->valorAccion() }}%</span>        
                  @else
                      <span class="rojo">{{ $accion->valorAccion() }}%</span>
                  @endif
                </td>
                <td>{{ number_format($accion->beneficios, 0, ',', '.') }}</td>
                <td>
                  <a class="vender tooltip" data-modal-target="venderAccion{{ $accion->id }}">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="tooltiptext">Vender Accion</span>
                  </a>
                </td>
            </tr>


            <div class="modal" id="venderAccion{{ $accion->id }}">
              <div class="contenido-modal">
                <div class="cabecera-modal">
                  <span class="cerrar-modal">&times;</span>
                  <h2>{{ __('economy.sellOtherShares') }}</h2>
                </div>
                <div class="cuerpo-modal">
      
                  <p>{{ __('economy.sellSharesConfirmation') }}</p><br>
                  <p>{{ __('economy.sellSharesInfo') }} 
                  <span class="verde">{{ number_format($accion->valorPrecio(), 0, ',', '.') }}€</span></p>
                
                </div>
                <div class="footer-modal">
                  <div class="botones">
                    <span class="cancelar">{{ __('economy.cancel') }}</span>
                    <a href="{{ route('economia.venderAcciones', ['id' => $accion->id]) }}" class="aceptar">{{ __('economy.confirm') }}</a>
                  </div>
                </div>
              </div>
            </div> 

            @endforeach
          </tbody>
        </table>
      </div>
      @else
          <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('economy.noShares') }}</h4>
          </div>
      @endif


      @foreach ($beneficios as $benficio)
        <input type="hidden" class="beneficiosUsuario" value="{{ $benficio }}">
      @endforeach

      @foreach ($fechas as $fecha)
        <input type="hidden" class="fechaUsuario" value="{{ $fecha }}">
      @endforeach
      
      <!-- Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        const ctx = document.getElementById('patrimonioChart');

        var beneficiosDom = document.getElementsByClassName('beneficiosUsuario');
        var fechasDom = document.getElementsByClassName('fechaUsuario');

        var beneficios = Array();
        var fechas = Array();

        for(var i = 0; i < beneficiosDom.length; i++){
          beneficios.push(beneficiosDom[i].value);
          fechas.push(fechasDom[i].value);
        }

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: fechas,
            datasets: [{
              label: 'Valor de la empresa',
              data: beneficios,
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
          }
        });
      </script>
      <script>
        const doughnut = document.getElementById('posesionEmpresa');

        let sede = @json($sede);

        let ePropiedad = (1 - sede.porcentajeVenta) * 100;
        let eVendido = sede.porcentajeComprado * 100;
        let eVenta = (sede.porcentajeVenta - sede.porcentajeComprado) * 100;        

        new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: ['On property', 'Selled', 'For sale'],
                datasets: [{
                    label: 'From your company value',
                    data: [ePropiedad, eVendido, eVenta],
                    backgroundColor: ['#2d8de8', '#388E3C', '#eee'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        function slide(event){
          var precio = event.nextElementSibling.nextElementSibling;
          precio.innerHTML = event.value
        }

      </script>
      <div class="modal" id="modalVenderCompanyia">
        <div class="contenido-modal">
          <form action="{{ route('economia.venderAccionesPropias') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>{{ __('routes.modifyRoute') }}</h2>
            </div>
            <div class="cuerpo-modal">
              
              @csrf
              <label for="precioBillete">{{ __('routes.modifyTicketPrice') }}</label>
              <input type="range" name="porcentajeVenta" id="porcentajeVenta" class="precioBilletes" value="1" min="1" max="25" oninput="slide(this)">
              <p style="margin: 0 5px 0 0; padding: 0; display: inline-block;">Valor:</p>
              <span id="precio" class="precio">1</span>%
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">{{ __('economy.cancel') }}</span>
                <input type="submit" class="aceptar" value="{{ __('economy.confirm') }}">
              </div>
            </div>
          </form>
        </div>
      </div> 
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()