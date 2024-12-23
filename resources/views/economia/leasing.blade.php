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
          <h1>{{ __('economy.leasing') }}</h1>
          <ul class="breadcrumb">
            <li><a href="{{ route('economia.index') }}">{{ __('economy.economy') }}</a></li>
            <li>/</li>
            <li><span>{{ __('economy.leasing') }}</span></li>
          </ul>
        </div>
      </div>

      <div class="resumen">
        <ul>
            <a href="{{ route('economia.leasingCompanyia', ['id' => 1]) }}">
                <li class="move-xy">
                    <i class='bx clogo'><img src="{{ asset('icons/aercap.svg') }}" alt="aercap"></i>
                    <h3>AerCap</h3>
                </li>
            </a>
            <a href="{{ route('economia.leasingCompanyia', ['id' => 2]) }}">
                <li class="move-xy">
                    <i class='bx clogo'><img src="{{ asset('icons/airlease.svg') }}" alt="AirLease"></i>
                    <h3>AirLease Corporation</h3>
                </li>
            </a>
            <a href="{{ route('economia.leasingCompanyia', ['id' => 3]) }}">
                <li class="move-xy">
                    <i class='bx clogo'><img src="{{ asset('icons/avolon.svg') }}" alt="avolon"></i>
                    <h3>Avolon</h3>
                </li>
            </a>
            <a href="{{ route('economia.leasingCompanyia', ['id' => 4]) }}">
                <li class="move-xy">
                    <i class='bx clogo'><img src="{{ asset('icons/smbc.svg') }}" alt="SMBS"></i>
                    <h3>SMBC Aviation</h3>
                </li>
            </a>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      @if(count($leasings) > 0)
      <div class="tablas">
        <div class="cabecera">
          <i class='bx bxs-plane-alt'></i>
          <h3>{{ __('economy.leasedPlanes') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>{{ __('fleet.aircraft') }}</th>
              <th>{{ __('economy.registration') }}</th>
              <th>{{ __('economy.model') }}</th>
              <th>{{ __('economy.pricePerDay') }}</th>
              <th>{{ __('economy.endLease') }}</th>
              <th>{{ __('economy.acctionEndLesase') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($leasings as $leasing)
            <tr>
              <td>
                <img class="img-avion" src="{{ asset($leasing->avion->img) }}" alt="{{ $leasing->matricula }}">
              </td>
              <td>{{ $leasing->matricula }}</td>
              <td>{{ $leasing->avion->modelo }}</td>
              <td>{{ $leasing->avion->leasePPD() }}€</td>
              <td>{{ $leasing->finLeasing }}</td>
              <td>
                <a class="vender tooltip" data-modal-target="endLease{{ $leasing->id }}">
                  <i class="bx bx-calendar-x move-ef"></i>
                  <span class="tooltiptext">{{ __('economy.acctionEndLesase') }}</span>
                </a>
              </td>
            </tr>

            <div class="modal" id="endLease{{ $leasing->id }}">
              <div class="contenido-modal">
                <div class="cabecera-modal">
                  <span class="cerrar-modal">&times;</span>
                  <h2>{{ __('economy.acctionEndLesase') }}</h2>
                </div>
                <div class="cuerpo-modal">
      
                  <p>{{ __('economy.endConfirmation') }}</p><br>
                  <p>{{ __('economy.endInfo') }} 
                  <span class="rojo">{{number_format($leasing->avion->leasePPD(), 0, ',', '.')}}€</span></p>
                  
                </div>
                <div class="footer-modal">
                  <div class="botones">
                    <span class="cancelar">{{ __('economy.cancel') }}</span>
                    <a href="{{ route('economia.finLeasing', ["id" => $leasing->id]) }}" class="aceptar">{{ __('economy.confirm') }}</a>
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
            <h4>{{ __('economy.noLeasings') }}</h4>
          </div>
      @endif
      
      <script src="{{ asset('js/modals.js') }}"></script>
    </main>
  </div>
@endsection()