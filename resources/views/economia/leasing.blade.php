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
            <a href="">
                <li class="move-xy">
                    <i class='bx bxs-plane-alt'></i>
                    <h3>AerCap</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bxs-bank'></i>
                    <h3>AirLease Corporation</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-coin-stack'></i>
                    <h3>Avolon</h3>
                </li>
            </a>
            <a href="">
                <li class="move-xy">
                    <i class='bx bx-coin-stack'></i>
                    <h3>SMBC Aviation</h3>
                </li>
            </a>
        </ul>
      </div>

      <!-- Alertas -->
      @include('partials.alertas')

      <div class="tablas">
        <div class="cabecera">
          <i class='bx bxs-plane-alt'></i>
          <h3>{{ __('economy.leasedPlanes') }}</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th>hola</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($ as $) --}}
            <tr>
              <td>hola</td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </main>
  </div>
@endsection()