<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>Tutorial</h1>

        <h2>Video en youtube</h2>
        <p>
            Para un analisis en detalle de los conceptos basicos de la aplicacion mira nuestro tutorial oficial en youtube sobre los conceptos de crear rutas y la gestion de la flota y espacios. Para guiarte lee la descripcion del video donde encontraras los capitulos del tutorial. <a href="https://www.youtube.com/watch?v=z0BdAgWylNQ" target="_blank">Clica aqui para ver el tutorial</a>
        </p>

        <h2>Gestión de la flota</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
               <p>
                    La gestion de la flota es una parte vital de tu compañia aerea. En la pestalla flota de tu compañia aerea podras encontrar toda la informacion respecto a tus aviones.
                </p>
                <p>
                    A primera vista se puede observar la condicion de tus aviones, y el estado en el que se encuentra el avion. Hay 3 estados diferentes: <span class="bold">En ruta</span>, que significa que el avion esta volando y siguiendo el itinerario que se ha configurado en sus rutas. <span class="bold">En tierra</span>, significa que el avion esta estacionado en la sede y no esta ralizando ninguna funcion en especifico y por ultimo <span class="bold">En mantenimiento</span>, este ultimo estado es en el que el avion esta en la sede siendo reparado.
                </p>
                <p>
                    Al final de la tabla podemos observar 3 botones diferentes, si se pasa el cursor por encima del boton se podra ver la funcion que tiene cada uno.
                </p>
                <p>
                    El primer boton de todos de color rojo se utiliza para poner en venta al avion, antes de completar la venta se mostrara una ventana de confirmacion para evitar posibles ventas accidentales.
                </p>
                <p>
                    El segundo boton de color amarillo es la opcion para mandar los aviones a mantenimiento, al hacerlo, las rutas de dicho avion se pondran en pausa hasta que en la sede se decida terminar el mantenimiento.
                </p>
                <p>
                    El tercer boton de color verde se utiliza para crear rutas en dicho avion especifico. Este boton es vital para crear la primera ruta del avion, habiendo creado ya una ruta en este avion, se puede hacer directamente en la pestalla de rutas.
                </p>
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/flota1.png') }}" alt="foto flota 1">
            </div>
        </div>

        <h2>Compra de aviones</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/flota2.png') }}" alt="foto flota 2">
            </div>
            <div class="texto">
                <p>
                    Una vez accedido al boton de comprar aviones desde la flota, nos encontramos con la pagina de comprar aviones, en la primera seccion de la pagina podemos encontrar 4 botones que nos llevaran a los aviones de <span class="bold">primera mano</span>  de los principales fabricantes de aviones. Ahi podemos elegir el modelo del avion de primera mano y nos llegara con un estado del 100% y de fabricacion nueva.
                </p>
                <p>
                    Si en cambio no nos podemos permitir un avion de primera mano, nos encontramos una segunda seccion en la pagina en la que encontraremos una tabla con aviones de <span class="bold">segunda mano</span>, aqui podremos comprar aviones ya usados de otras compañias aereas, tienen un estado especifico y segun ese estado podremos encontrarnos un precio mas barato o mas caro.
                </p>
                <p>
                    <span class="bold">¡ATENCION!</span>, esta tabla esta es la misma para todos los usuarios, es decir que todos los usuarios tienen derecho a comprar el mismo avion que estas viendo tu, osea que si quieres comprar un avion de segunda mano que te ha llamado la atencion puede ser que no lo vuelvas a encontrar ya que otro usuario lo haya comprado por ti.
                </p>
                <p>
                    La tabla de aviones de segunda mano se va actualizando por cada compra que se hace, añadiendo mas aviones para la venta de segunda mano.
                </p>
            </div>
        </div>

        <h2>Gestión de las rutas</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
               <p>
                    Las rutas son la piedra angular de tu compañia aerea, debes tener rutas eficientes con una buena demanda para obtener grandes beneficios.
               </p>
               <p>
                    En el apartado de gestion de la flota se ha explicado como crear la primera ruta de un avion y en el siguiente apartado se explica como funciona el crear rutas, si ya tenemos varias creadas para nuestro avion se puede obseservar que hay un mensaje que pone <span class="bold">RUTA INACTIVA</span>, esto quiere decir que la ruta no esta en funcionamiento y que no esta generando beneficios, para que el avion cambie de estado y la ruta se active hay que presionar el boton de <span class="bold">Activar Ruta</span>, una vez activado este boton desaparecera.
               </p>
               <p>
                    Si queremos añadir nuevas rutas al avion tenemos el boton de acceso directo de <span class="bold">Crear Ruta</span>, pero si lo preferimos tambien tenemos el boton de crear ruta desde la pesatalla de flota.
               </p>
               <p>
                    Las dos acciones que podemos hacer en el avion es una con el primer boton que <span class="bold">elimina la ruta</span> y el otro que <span class="bold">la modifica</span>.
               </p>
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/ruta1.png') }}" alt="foto ruta 1">
            </div>
        </div>

        <h2>Crear rutas</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/ruta2.png') }}" alt="foto ruta 2">
            </div>
            <div class="texto">
                <p>
                    Hay que entender que las rutas es la parte mas restrictiva del programa y que puede llegar a haber complicaciones al crear la ruta mas optima.
                </p>
                <p>
                    Lo primero de todo es seleccionar el origen y el destino hay que tener en cuenta que como es obvio <span class="bold">no se puede tener el mismo origen y destino</span> en una ruta.
                </p>
                <p>
                    Una vez seleccionado el origen y destino, seleccionaremos la hora de salida del avion, es muy importante de que <span class="bold">no coincida con otras rutas el horario</span>, para ello tenemos una tabla con los horarios de salida y llegada del avion para ayudarnos a crear la ruta, se encuentra debajo del todo.
                </p>
                <p>
                    Tambien se puede encontrar un mapa en el que nos asistira a crear la ruta, mostrandonos el rango maximo del avion, respecto al aeropuerto de origen y los aeropuertos en los que tenemos espacios comprados. Tambien al seleccionar origen y destino, el mapa, dibujara una linea mostrandonos la ruta que vamos a crear.
                </p>
                <p>
                    Por ultimo, lo que mas nos interesa, es seleccionar un precio del billete, cuanto mas caro sea el vuelo menos demanda tendremos y nos arriesgamos a que el avion vuele vacio o con pocos pasageros. Pero en cambio cuanto mas barato sea mas demanda tendremos y podremos con el avion lleno.
                </p>
                <p>
                    Para finalizar la creacion de la ruta encontraremos debajo de la tabla de los tiempos un boton que nos comfirmara la creacion de la nueva ruta.
                </p>
            </div>
        </div>

        <h2>Gestión de los espacios</h2>
        <div class="informacion-imagen extendido">
            <div class="texto">
               <p>
                    La gestion de espacios es una parte vital para la creacion de rutas, si no tienes espacios en un aeropuerto el avion no puede operar en dicho aeropuerto.
               </p>
               <p>
                    Para ello debemos comprar espacios nuevos. <span class="bold">¡ATENCION!</span>, los espacios son limitados y son los mismos para cada usuario.
               </p>
               <p>
                    Es decir, si ponemos de ejemplo el aeropuerto de Zaragoza, este aeropuerto cuenta con 50 espacios, si multiples usuarios compran los 50 espacios tu no podras comprar porque no habra disponibles.
               </p>
               <p>
                    Tienes un apartado que visualiza cuantos espacios tienes disponibles sin utilizar y que estan libres.
               </p>
               <p>
                    En caso de querer vender un espacio, debes hacer click en el boton rojo de acciones, pero solo se vendera si tienes espacios disponibles y no estan ocupados por algun avion.
               </p>
            </div>
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/espacios1.png') }}" alt="foto espacios 1">
            </div>
        </div>

        <h2>Espiar a la competencia</h2>
        <div class="informacion-imagen extendido">
            <div class="imagen-50">
                <img src="{{ asset('images/tutorial/competencia1.png') }}" alt="foto competencia 1">
            </div>
            <div class="texto">
                <p>
                    ¿Quieres saber que esta haciendo los otros usuarios? Pues aqui podras encontrar diferentes herramientas que seran utiles, para ello.
                </p>
                <p>
                    La primera es para valorar lo mucho que esta <span class="bold">demandada una ruta</span>, cuantas mas rutas haya menos demanda tendra y dejara de ser rentable, ya que no se obtendran tantos benedicios. Para ello seleccionamos el destino y el origen y podemos valorar si sale rentable abrir una ruta nueva.
                </p>
                <p>
                    La segunda herramienta sirve para simplemente ver las <span class="bold">rutas creadas de un usuario en especifico</span>, asi puedes ver que rutas maneja el usuario y cuales podrias copiar incluso, preparar estrategias para sobrexplotar la ruta y perjudicar los beneficios de ese usuario.
                </p>
                <p>
                    Y por ultimo se puede observar un mapa en el que saldran los aviones que estan volando en ese mismo momento de todas las copañias, con su nombre si se clica en el avion (Si se trata de un avion tuyo se mostrara la matricula)
                </p>
            </div>
        </div>

        <h2>¿Mas dudas?</h2>
        <p>
            Si tienes mas dudas sobre la aplicacion no dudes en entrar en nuestro servidor de <a href="https://discord.gg/sUueRvrttY" target="_blank">Discord</a>, si no quieres y piensas que has encontrado un bug, (dentro de la aplicacion) en el menu superior encontraras un boton para reportar un bug. Si quieres conocer mas sobre este proyecto te invito a visitar la pagina <a href="{{ route('landing.sobreMi') }}">Sobre mi</a>.
        </p>
    </main>

    @include('partials.footer')
</body>
</html>