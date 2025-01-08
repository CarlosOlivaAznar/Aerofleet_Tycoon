<!DOCTYPE html>
<html lang="es">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>Tutorial</h1>

        <h2>{{ __('tutorial.youtubeVideoTitle') }}</h2>
        {!! __('tutorial.youtubeVideo') !!}

        <h2>{{ __('tutorial.fleetManagementTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
                {!! __('tutorial.fleetManagement') !!}
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/flota1.png') }}" alt="foto flota 1">
            </div>
        </div>

        <h2>{{ __('tutorial.buyAircraftTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/flota2.png') }}" alt="foto flota 2">
            </div>
            <div class="texto">
                {!! __('tutorial.buyAircraft') !!}
            </div>
        </div>

        <h2>{{ __('tutorial.routeManagementTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
                {!! __('tutorial.routeManagement') !!}
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/ruta1.png') }}" alt="foto ruta 1">
            </div>
        </div>

        <h2>{{ __('tutorial.createRutesTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/ruta2.png') }}" alt="foto ruta 2">
            </div>
            <div class="texto">
                {!! __('tutorial.createRutes') !!}
            </div>
        </div>

        <h2>{{ __('tutorial.slotsManagementTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
                {!! __('tutorial.slotsManagement') !!}
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/espacios1.png') }}" alt="foto espacios 1">
            </div>
        </div>

        <h2>{{ __('tutorial.spyOnYourCompetenceTitle') }}</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/competencia1.png') }}" alt="foto competencia 1">
            </div>
            <div class="texto">
                {!! __('tutorial.spyOnYourCompetence') !!}
            </div>
        </div>

        <h2>{{ __('tutorial.moreInfoTitle') }}</h2>
        <p>
            {!! __('tutorial.moreInfo') !!}
            <a href="{{ route("landing.sobreMi") }}">{{ __('tutorial.moreInfoAM') }}</a>
        </p>
    </main>

    @include('partials.footer')
</body>
</html>