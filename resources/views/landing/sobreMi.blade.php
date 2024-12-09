<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>{{ __('landing.aboutMe') }}</h1>

        <h2>{{ __('landing.who') }}</h2>
        <div class="informacion-imagen">
            <div class="texto">
                <p>
                    {{ __('landing.whoT1') }}
                </p>
                <p>
                    {{ __('landing.whoT2') }}
                </p>
                <p>
                    {{ __('landing.whoT3') }}
                </p>
                <p>
                    {{ __('landing.whoT4') }}
                </p>
            </div>
            <div class="imagen">
                <img src="{{ asset('images/sobreMi2.jpg') }}" alt="sobre mi foto 1">
            </div>
        </div>

        <h2>{{ __('landing.objt') }}</h2>
        <div class="informacion-imagen">
            <div class="imagen">
                <img src="{{ asset('images/sobreMi1.jpg') }}" alt="sobre mi foto 2">
            </div>
            <div class="texto">
                <p>
                    {{ __('landing.objtT1') }}
                </p>
                <p>
                    {{ __('landing.objtT2') }}
                </p>
                <p>
                    {{ __('landing.objtT3') }}
                </p>
                <p>
                    {{ __('landing.objtT4') }}<a
                        href="{{ route('landing.donar') }}">{{ __('landing.objtDonate') }}</a>.
                </p>
            </div>
        </div>

        <div class="socials" id="socials">
            <h2 class="subtituloPagina">Mis redes sociales</h2>
            <p class="subtituloPagina">ponte en contacto conmigo o sigueme en mis redes sociales</p>

            <div class="social-content">
                <a href="https://x.com/Ramboo018" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-twitter'></i></div>
                        <p>@Ramboo018</p>
                    </div>
                </a>
                <a href="https://www.instagram.com/carlos__0018/profilecard/?igsh=MWFkMDdhMWxzMzFjbg==" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-instagram'></i></div>
                        <p>@Carlos__018</p>
                    </div>
                </a>
                <a href="https://www.linkedin.com/in/carlos-oliva-20335b2b3/" target="_blank">
                    <div class="card">
                        <div><i class='bx bxl-linkedin-square' ></i></div>
                        <p>Carlos Oliva</p>
                    </div>
                </a>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
