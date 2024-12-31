@extends('master')

@section('content')
    <main>
        <div class="pag-login" style="background-image: url({{ asset('images/bg-auth.jpg') }})">
            <div class="contenido-loading">
                <div class="loader">
                    <span style="--c:1;"></span>
                    <span style="--c:2;"></span>
                    <span style="--c:3;"></span>
                    <span style="--c:4;"></span>
                    <span style="--c:5;"></span>
                    <span style="--c:6;"></span>
                    <span style="--c:7;"></span>
                    <span style="--c:8;"></span>
                    <span style="--c:9;"></span>
                    <span style="--c:10;"></span>
                    <span style="--c:11;"></span>
                    <span style="--c:12;"></span>
                    <span style="--c:13;"></span>
                    <span style="--c:14;"></span>
                    <span style="--c:15;"></span>
                    <span style="--c:16;"></span>
                    <span style="--c:17;"></span>
                    <span style="--c:18;"></span>
                    <span style="--c:19;"></span>
                    <span style="--c:20;"></span>
                    <div class="avion"></div>
                </div>

                <h3 id="titulo">Calculando Rutas</h3>

                <input type="hidden" class="txt" value="{{ __('home.txtLoading1') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading2') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading3') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading4') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading5') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading6') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading7') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading8') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading9') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading10') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading11') }}">
                <input type="hidden" class="txt" value="{{ __('home.txtLoading12') }}">

            </div>

        </div>
    </main>
    <script>
        window.addEventListener('load', function() {
              setTimeout(() => {
                window.location.href = "{{ route('home.index') }}";
              }, 500);
            }) 

        let textos = document.getElementsByClassName('txt');


        cambiarTexto();

        function cambiarTexto() {
            setTimeout(() => {
                let numero = Math.floor(Math.random() * textos.length);
                let titulo = document.getElementById("titulo");
                titulo.innerHTML = "";

                var txt = textos[numero].value;
                var indice = 0;

                typeWriterEffect();
                
                function typeWriterEffect() {
                    if (indice < txt.length) {
                        titulo.innerHTML += txt.charAt(indice);
                        indice++;
                        setTimeout(typeWriterEffect, 33);
                    }
                }

                cambiarTexto();

            }, 5000);
        }
    </script>
@endsection
