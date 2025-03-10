<!DOCTYPE html>
<html>

<head>
    @include('partials.head')

    @php
        $respuesta = json_decode(Http::get('http://ip-api.com/json/?fields=61439'));
        if (Cookie::get('manualChange') != true) {
            if ($respuesta) {
                $codigoPais = strtolower($respuesta->countryCode);
                Session::put('locale', $codigoPais);
            } else {
                Session::put('locale', 'en');
            }
        }
    @endphp
</head>

<body>
    @include('partials.navbarLanding')
    <img class="imagenTitulo" src="{{ asset('images/horarios2.jpg') }}" alt="horariosAvion">
    <main class="mainContent">
        <div class="nombre-logo">
            <img src="{{ asset('images/logos/logo_AFT_icon.png') }}" alt="logo">
            <h1>AeroFleet Tycoon</h1>
        </div>
        <h2 class="subtituloPagina">{{ __('landing.realTimeSim') }}</h2>
        <p class="subtituloPagina">{{ __('landing.realTimeSimSub') }}</p>
        <div class="resumen mb-150">
            <ul>
                <li>
                    <i class="bx bx-stats"></i>
                    <h3>{{ __('landing.demand') }}</h3>
                    <h4>{{ __('landing.demandTxt') }}</h4>
                </li>
                <li>
                    <i class="bx bx-group"></i>
                    <h3>{{ __('landing.multiplayer') }}</h3>
                    <h4>{{ __('landing.multiplayerTxt') }}</h4>
                </li></a>
                <li>
                    <i class="bx bxs-badge-dollar"></i>
                    <h3>{{ __('landing.free') }}</h3>
                    <h4>{{ __('landing.freeTxt') }}</h4>
                </li>
                <li>
                    <i class="bx bx-network-chart"></i>
                    <h3>{{ __('landing.monopoly') }}</h3>
                    <h4>{{ __('landing.monopolyTxt') }}</h4>
                </li>
            </ul>
        </div>

        <div class="informacion-imagen mb-36">
            <div class="texto">
                {!! __('landing.infoText1') !!}
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/landing-1.png') }}" alt="Gestión de flota">
            </div>
        </div>

        <div class="informacion-imagen mb-150">
            <div class="imagen-50">
                <img src="{{ asset('images/landing-2.png') }}" alt="Competencia en el mercado">
            </div>
            <div class="texto">
                {!! __('landing.infoText2') !!}
            </div>
        </div>


        <div class="imagenConTexto" style="background-image: url('{{ asset('images/emiratesFondo.jpg') }}');">
            <h3>{{ __('landing.start') }}</h3>
            <a href="{{ route('register') }}">{{ __('landing.register') }}</a>
        </div>

        <div class="info-donar">
            <h2 class="subtituloPagina">{{ __('landing.donateInfoTitle') }}</h2>
            <p class="subtituloPagina">{{ __('landing.donateInfosubtitle') }}</p>

            <div>
                <div class="text">
                    <p>{{ __('landing.donateInfoMainText') }}</p>

                    <p>{{ __('landing.donateSupport') }}</p>
                    <a href="{{ route('landing.donar') }}">{{ __('landing.donateInfoPage') }}</a>
                </div>
                <div class="imagen">
                    <img src="{{ asset('images/donate-landing.png') }}" alt="comunidad-aerofleet">
                </div>
            </div>
        </div>

        <div class="socials">
            <h2 class="subtituloPagina">{{ __('landing.followUs') }}</h2>
            <div class="social-content">
                <a href="" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-twitter'></i></div>
                        <p>@aerofleet</p>
                    </div>
                </a>
                <a href="" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-tiktok'></i></div>
                        <p>aerofleet</p>
                    </div>
                </a>
                <a href="" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-reddit'></i></div>
                        <p>r/aerofleet</p>
                    </div>
                </a>
                <a href="https://discord.gg/sUueRvrttY" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-discord-alt'></i></div>
                        <p>AeroFleet Tycoon</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="changelog collapse">
            <h3>{{ __('landing.changelog') }}</h3>
            <hr>

            <div class="collapse-content" id="collapse-content">
                {!! __('changelog.changelog') !!}
            </div>
            <div class="button" id="changelogButton">
                <p>{{ __('landing.showMore') }}</p>
                <i class="bx bx-chevron-down"></i>
            </div>
            <input type="hidden" name="showMore" id="showMore" value="{{ __('landing.showMore') }}">
            <input type="hidden" name="showLess" id="showLess" value="{{ __('landing.showLess') }}">
        </div>
    </main>

    <script>
        // Mostrar contenido changelog
        let boton = document.getElementById('changelogButton');
        let contenido = document.getElementById('collapse-content');

        let mostrarMas = document.getElementById('showMore').value;
        let mostrarMenos = document.getElementById('showLess').value;

        boton.addEventListener("click", function() {
            if (contenido.getAttribute('class') === 'collapse-content') {
                contenido.setAttribute("class", "collapse-content expand");

                // Cambiar texto y propiedades
                boton.childNodes[1].innerHTML = mostrarMenos;
                boton.childNodes[3].setAttribute("class", "bx bx-chevron-up");
            } else {
                contenido.setAttribute("class", "collapse-content");

                // Cambiar texto y propiedades
                boton.childNodes[1].innerHTML = mostrarMas;
                boton.childNodes[3].setAttribute("class", "bx bx-chevron-down");
            }
        });
    </script>

    @include('partials.footer')
</body>

</html>
