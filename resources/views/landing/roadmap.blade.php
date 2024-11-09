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
                    <p>Simulacion a tiempo real y mecanicas báscicas de jubailidad</p>
                </div>
                <div class="side-card left">
                    <h2>V-0.4.0</h2>
                    <p>Simulacion a tiempo real y mecanicas báscicas de jubailidad</p>
                </div>
            </div>
            <div><img src="{{ asset('images/roadMap.png') }}" alt="roadMapImage"></div>
            <div class="side right">
                <div class="side-card right">
                    <h2>V-0.3.0</h2>
                    <p>Simulacion a tiempo real y mecanicas báscicas de jubailidad</p>
                </div>
                <div class="side-card right">
                    <h2>V-0.5.0</h2>
                    <p>Simulacion a tiempo real y mecanicas báscicas de jubailidad</p>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
