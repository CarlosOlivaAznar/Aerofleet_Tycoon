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
                    <h2>{{ __('landing.version2') }}</h2>
                    <p>{{ __('landing.version2txt') }}</p>
                </div>
                <div class="side-card left">
                    <h2>{{ __('landing.version4') }}</h2>
                    <p>{{ __('landing.version4txt') }}</p>
                </div>
                <div class="side-card left">
                    <h2>{{ __('landing.version6') }}</h2>
                    <p>{{ __('landing.version6txt') }}</p>
                </div>
                <div class="side-card left">
                    <h2>{{ __('landing.version10') }}</h2>
                    <p>{{ __('landing.version10txt') }}</p>
                </div>
            </div>
            <div><img src="{{ asset('images/roadMap.png') }}" alt="roadMapImage"></div>
            <div class="side right">
                <div class="side-card right">
                    <h2>{{ __('landing.version3') }}</h2>
                    <p>{{ __('landing.version3txt') }}</p>
                </div>
                <div class="side-card right">
                    <h2>{{ __('landing.version5') }}</h2>
                    <p>{{ __('landing.version5txt') }}</p>
                </div>
                <div class="side-card right">
                    <h2>{{ __('landing.version7') }}</h2>
                    <p>{{ __('landing.version7txt') }}</p>
                </div>
                <div class="side-card right">
                    <h2>{{ __('landing.versionx') }}</h2>
                    <p>{{ __('landing.versionxtxt') }}</p>
                </div>
            </div>
        </div>        
    </main>
    @include('partials.footer')
</body>

</html>
