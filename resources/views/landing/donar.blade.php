<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>Donar</h1><br>

        <a href="https://www.paypal.com/donate/?hosted_button_id=FQRV7KNMPJQNL" target="_blank"><div class="changelog" style="margin-bottom: 25px; text-align: center; cursor: pointer;" >
            <h3>Haz click para acceder a la pagina de donativos de paypal</h3>
        </div></a>

        <div class="changelog" style="padding: 25px 30px">
            <h3>¡Muchas Gracias!</h3>

            <p style="margin-top: 15px">
                De verdad, gracias, este proyecto esta financiado completamente con donaciones, a si que toda ayuda cuenta para continuar desarrollando esta aplicacion. Cada pequeño gesto cuenta y ayuda a asegurar que pueda seguir ofreciéndoles nuevo contenido y constantes actualizaciones.
            </p><br>
            <p>
                Si disfrutan del contenido que les proporciono y desean apoyar mi trabajo, les invito cordialmente a considerar hacer una donación. Cualquier cantidad, por pequeña que sea, será recibida con gratitud y será invertida en mejorar la pagina.
            </p><br>
            <p>
                Gracias de nuevo por su continuo apoyo y por ser parte de esta comunidad.
            </p><br>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>