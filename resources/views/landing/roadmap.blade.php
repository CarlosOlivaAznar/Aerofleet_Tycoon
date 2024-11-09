<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>{{ __('landing.roadMap') }}</h1>
        <div class="roadmap-layout">
            <div class="side">
                <div class="side-card left">
                    <h2>V-0.2.0</h2>
                    <p>Implementación de simulación en tiempo real y mecánicas básicas de jugabilidad para las operaciones iniciales del juego.</p>
                </div>
                <div class="side-card left">
                    <h2>V-0.4.0</h2>
                    <p>Actualización económica: sistema de leasing de aviones, opciones de préstamos, compra y venta de acciones entre jugadores y adición de subvenciones gubernamentales.</p>
                </div>
                <div class="side-card left">
                    <h2>V-0.6.0</h2>
                    <p>Introducción de alianzas entre jugadores, incluyendo chats grupales y la creación de grupos de aerolíneas para una experiencia colaborativa.</p>
                </div>
                <div class="side-card left">
                    <h2>V-1.0.0</h2>
                    <p>Versión completa y estable del juego, con todas las mecánicas optimizadas y listas para su lanzamiento oficial.</p>
                </div>
            </div>
            <div><img src="{{ asset('images/roadMap.png') }}" alt="roadMapImage"></div>
            <div class="side right">
                <div class="side-card right">
                    <h2>V-0.3.0</h2>
                    <p>Implementación del modo multijugador con cálculo de oferta y demanda, eventos aleatorios y recursos limitados en el entorno.</p>
                </div>
                <div class="side-card right">
                    <h2>V-0.5.0</h2>
                    <p>Simulación del estado de la compañía, introducción de la opinión de los clientes, contratos de handling y servicios de atención al pasajero.</p>
                </div>
                <div class="side-card right">
                    <h2>V-0.7.0</h2>
                    <p>Incorporación de transporte de mercancías, simulación de precios dinámicos y ajustes en compra y venta según la demanda del mercado.</p>
                </div>
                <div class="side-card right">
                    <h2>V-X.X.X</h2>
                    <p>Futuras versiones con más características y mejoras por anunciar.</p>
                </div>
            </div>
        </div>        
    </main>
    @include('partials.footer')
</body>

</html>
