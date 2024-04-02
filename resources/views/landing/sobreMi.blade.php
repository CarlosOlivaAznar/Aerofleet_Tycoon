<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/estilos.css">
  <title>AeroFleet</title>
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>Sobre mi</h1>

        <h2>¿Quien soy?</h2>
        <div class="informacion-imagen">
            <div class="texto">
                <p>
                    Soy Carlos Oliva un desarrollador de software de España, naci en Zaragoza, ciudad en la que he hecho mis estudios. Hice el bachiller de ciencias sociales y más tarde realice dos grados superiores, desarrollo de aplicaciones multiplataforma y desarrollo de aplicaciones web. Muy a pesar de mis profesores del bachiller, logre sacar los dos grados superiores con muy buenas notas.
                </p>
                <p>
                    Desde que tengo 9 años he tenido una pasion por la aviacion muy grande, haciendo que con una edad muy temprana sepa pilotar diferentes aeronaves en simuladores o en la vida real con vehiculos a radio control como drones o aviones (he estrellado unos cuantos). Como muchos que compartimos este hobbie estoy en la ultima etapa antes de poder plantearme ser piloto de avion, solo necesito ahorrar 80.000 euros, dios quiera que me toque la loteria o tendre vender un riñon a alguna mafia de Bielorusia.
                </p>
                <p>
                    Esta aplicacion la he hecho para el proyecto de fin de curso del grado superior de desarrollo de aplicaiones web. Es mi aproximacion a lo que yo creo que deberia ser una aplicacion de gestion, gratis, sin anuncios ni modenas premium ni trampas para que la gente gaste dinero en un videojuego.
                </p>
                <p>
                    Hay que tener en cuenta que sigo aprendiendo dia a dia y no soy perfecto, la aplicacion puede tener fallos o no puede estar hecha la pagina a tu medida. Si hay algo que se pueda mejorar acepto sugerencias y consejos para mejorar
                </p>
            </div>
            <div class="imagen">
                <img src="{{ asset('images/concordeCentrado.png') }}" alt="">
            </div>
        </div>

        <h2>¿Cual es mi objetivo?</h2>
        <div class="informacion-imagen">
            <div class="imagen">
                <img src="{{ asset('images/concordeCentrado.png') }}" alt="">
            </div>
            <div class="texto">
                <p>
                    Siempre he sido un gran aficionado a los juegos de gestion, en parte por culpa de mi padre que me dejaba jugar con 3 años al Zoo Tycoon 2 y al Dino Island, y he probado diferentes juegos de aviacion de gestion, el problema es que me di cuenta que no encontre nunca uno que me acabase de convencer ya que todos tenian microtransacciones o monedas premium que extropeaban la experiencia de juego, algunos incluso despues de unas horas te bloqueaban el juego para que tuvieses que pagar para poder seguir jugando.
                </p>
                <p>
                    Por culpa de estos juegos siempre se me quedo la idea de hacer un juego del mismo estilo sin tener que pagar dinero real por cada accion que tuvieses que hacer.
                </p>
                <p>
                    Por esto y porque tengo que entregar un proyecto a final de curso me puse a hacer mi idea realidad.
                </p>
                <p>
                    El juego esta financiado completamente de mi bolsillo y no pondre anuncios ni microtransacciones en la aplicacion, si quieres apoyar es completamente voluntario y se puede hacer en el apartado de donar.
                </p>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>