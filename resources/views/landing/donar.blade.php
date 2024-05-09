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
            <h3>Haz click para acceder a la pagina de donativos de PayPal</h3>
        </div></a>

        <div class="changelog" style="padding: 25px 30px">
            <h3>¡Muchas Gracias!</h3>

            <p style="margin-top: 15px">
                De verdad, gracias de todo corazón. Este proyecto es completamente financiado por donaciones, lo que significa que cada contribución cuenta enormemente para seguir desarrollando y mejorando esta aplicación. Cada pequeño gesto de apoyo se valora profundamente y contribuye significativamente a asegurar que podamos continuar ofreciéndote nuevo contenido y actualizaciones constantes.
            </p><br>
            <p>
                Si la aplicación te ha resultado útil y deseas respaldar mi trabajo, te invito cordialmente a considerar realizar una donación. Cualquier cantidad, por modesta que sea, será recibida con sincero agradecimiento y se utilizará para potenciar y mejorar aún más la experiencia en nuestra plataforma.
            </p><br>
            <p>
                Además, si deseas conocerme mejor y descubrir quién está detrás de este proyecto, te animo a que visites la sección <a href="{{ route('landing.sobreMi') }}">Sobre mí</a> en nuestra página web. Y para mantenerte al tanto de todas las novedades y actualizaciones, te invito a unirte a nuestro <a href="https://discord.gg/sUueRvrttY" target="_blank">servidor de Discord</a>, donde podrás interactuar con otros usuarios, compartir tus sugerencias y opiniones y podras tener un rol exclusivo si has donado, pudiendo enterarte de las novedades antes que nadie y poder tener acceso exclusivo a futuras actualizaciones.
            </p><br>
            <p>
                Una vez más, quiero expresar mi más profundo agradecimiento por tu continuo apoyo y por ser parte activa de esta maravillosa comunidad. ¡Gracias por creer en este proyecto y por contribuir a su crecimiento y éxito!
            </p><br>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>