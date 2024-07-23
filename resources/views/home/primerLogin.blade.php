@extends('master')

@section('estilosBody')
    style="background-image: url('{{ asset('images/bg-auth.jpg') }}');"
@endsection

@section('content')
<main  class="mainContent">
  
  <form action="{{ route('home.submit') }}" method="POST" autocomplete="off">
      @csrf
      <div class="formulario">
          <h1>{{ __('home.newAirline') }}</h1>

          <div class="campos">
              <label for="nombreCompanyia">{{ __('home.airlineName') }}</label>
              <input type="text" name="nombreCompanyia" id="nombreCompanyia" required>
          </div>

          <div class="campos">
              <label for="sede">{{ __('home.hqLocalization') }}</label>

              <input type="text" class="select" name="sede" id="sede" onfocus="mostrarDd('dropDown', this)" onblur="ocultarDd('dropDown')" onkeyup="filtrar(this, 'dropDown')" placeholder="{{ __('home.searchLocalization') }}">
              <input type="hidden" id="sedeHid" name="sedeHid" value="">
              
              <div class="drop-down" id="dropDown">
                @foreach ($aeropuertos as $aeropuerto)
                    <p id="{{ $aeropuerto->id }}" onmousedown="seleccionar(this, 'sede', 'sedeHid')">{{ $aeropuerto->nombre }}</p>
                @endforeach
              </div>
          </div>

          <div class="campos">
            <input type="submit" value="{{ __('home.begin') }}">
          </div>
      </div>
  </form>
  <script src="{{ asset('js/dropdown.js') }}"></script>
</main>