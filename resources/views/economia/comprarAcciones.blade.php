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
          <h1>{{ __('economy.buyShares') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><a href="{{ route('economia.acciones') }}">{{ __('economy.shares') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.buyShares') }}</span></li>
          </ul>
        </div>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($sedes) > 0)
      <div class="tablas">
        <div class="cabecera">
            <i class='bx bx-coin-stack'></i>
            <h3>{{ __('economy.aviableShares') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
                <th>{{ __('economy.airline') }}</th>
                <th>{{ __('economy.airlineValue') }}</th>
                <th>{{ __('economy.percentajeOnSale') }}</th>
                <th>{{ __('economy.totalPrice') }}</th>
                <th>{{ __('economy.purcheaseShares') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sedes as $sede)
            <tr>
                <td>{{ $sede->user->nombreCompanyia }}</td>
                <td>{{ number_format($sede->user->patrimonio(), 0, ',', '.') }}€</td>
                <td>{{ ($sede->porcentajeVenta - $sede->porcentajeComprado) * 100 }}%</td>
                <td>{{ number_format((($sede->porcentajeVenta - $sede->porcentajeComprado) * $sede->user->patrimonio()), 0, ',', '.') }}€</td>
                <td>
                  <a class="comprar tooltip" data-modal-target="modalComprarAccion{{ $sede->id }}">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="tooltiptext">{{ __('economy.purcheaseShares') }}</span>
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
          <h4>{{ __('economy.noShares') }}</h4>
        </div>
      @endif
      
      <script>
        function slide(event){
          var precio = event.nextElementSibling.nextElementSibling;
          precio.innerHTML = event.value
        }
      </script>

      @foreach ($sedes as $sede)
      <div class="modal" id="modalComprarAccion{{ $sede->id }}">
        <div class="contenido-modal">
          <form action="{{ route('economia.comprarAccionesPost') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>{{ __('economy.buyShares') }}</h2>
            </div>
            <div class="cuerpo-modal">

              <p>{{ __('economy.buySharesConfirmation') }}</p><br>
              
              @csrf
              <input type="range" name="porcentajeAcciones" id="porcentajeAcciones" class="precioBilletes" value="1" min="1" max="{{ (($sede->porcentajeVenta - $sede->porcentajeComprado) * 100) }}" oninput="slide(this)">
              <p style="margin: 0 5px 0 0; padding: 0; display: inline-block;">Valor:</p>
              <span id="precio" class="precio">1</span>%

              <input type="hidden" name="sede" value="{{ $sede->id }}">
              
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
      @endforeach
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()