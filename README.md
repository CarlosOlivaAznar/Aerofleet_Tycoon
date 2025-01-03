# Aerofleet Tycoon

Proyecto desarrollado por Carlos Oliva Aznar

## Que es Aerofleet

Aerofleet Tycoon es un videojuego de simulacion a tiempo real de una compañia aerea, en la que se puede gestionar una flota de aviones utilizando los hangares de la sede y realizando mantenimiento de las aeronaves y gestionando las rutas de la compañía aérea empleado los aviones de tu propiedad. También la gestión de los espacios de los aeropuertos y los diferentes
pagos del alquiler de la sede y el salario de los ingenieros de mantenimiento de las aeronaves

## Despliegue de la aplicacion

La aplicacion esta alojada en un servidor de [DigitalOcean](https://www.digitalocean.com/), para el correcto despliegue hay que añadir las siguientes variables de entorno en el servidor

```
APP_KEY=base64:QjO74FKmHIODNEMPmayc3oZDuvPTRQMNxetNM6ZdpZk=
DB_CONNECTION=pgsql
DB_HOST=app-bc765225-bc32-41ae-8f2e-d68447c10c71-do-user-16167512-0.c.db.ondigitalocean.com
DB_PORT=25060
DB_DATABASE=aerofleettycoon
DB_USERNAME=aerofleettycoon
DB_PASSWORD=(oculta por motivos de seguridad)
APP_NAME=aerofleettycoon
APP_ENV=production
APP_DEBUG=false
DATABASE_URL=${aerofleettycoon.DATABASE_URL}
APP_URL=https://aerofleettycoon-7wttf.ondigitalocean.app/
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=aerofleettycoon@gmail.com
MAIL_PASSWORD=(oculta por motivos de seguridad)
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=aerofleettycoon@gmail.com
MAIL_FROM_NAME=AeroFleetTycoon
```

El dominio de la aplicacion es [aerofleet.app](aerofleet.app) comprado en [hostinger](https://www.hostinger.es/hosting-web)


## Desarrollo de la aplicacion

Hay diferentes elementos de la web que los he diseñado personalmente dandoles estilo y utilizando blade para un uso general de estos elementos. Codigo y utilizacion de estos elementos

### Alertas

Para dibujar alertas se incluira en el archivo blade.php el siguiente include.

```
@include('partials.alertas')
```

Para que funcione tenemos que hacer una variable de sesion flash para que muestre los datos, hay 3 tipos 'error', 'warning' y 'exito'

```
session()->flash('error', 'Error al vender el avion');
```

### Mensaje

Se utiliza para dar un mensaje de alerta segun el mensaje por ejemplo un mensaje en el que ponga que no hay aviones comprados.

```
<div class="mensaje">
    <i class="bx bx-error"></i>
    <h4>No tienes ningun avion en tu propiedad</h4>
</div>
```

### Boton de caracter general

Boton alineado a la derecha, se utiliza con la clase .boton en un <a>

```
<a href="{{ route('rutas.crearRuta') }}" class="boton">
    <i class="bx bx-plus-circle"></i>
    <span>Crear Ruta</span>
</a>
```

### Breadcrumbs

Los breadcrumbs van debajo del titulo, dentro del div del titulo

```
<ul class="breadcrumb">
    <li><a href="{{ route('espacios.index') }}">Espacios</a></li>
    <li>/</li>
    <li><span>Comprar Espacios</span></li>
</ul>
```

### Tooltips

Se pone dentro de un div y añadiendo la clase "tooltip", luego se añade dentro del div el siguiente elemento

```
<span class="tooltiptext">Comprar Avion</span>
```

### Modales

Se tiene que incluir diferentes archivos para hacer funcionar los modales, dentro del modal se puede introducir datos, titulos, formularios y campos diferentes.

Hay que añadir el siguiente atributo a un elemento <a>

```
data-modal-target="bugReport"
```

luego hay que añadir el modal y que coincidan los ids del target y del modal

```
<div class="modal" id="bugReport">
    <div class="contenido-modal">
        <form action="{{ route('bugreport') }}" method="POST">
        <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>Informar de un error</h2>
        </div>
        <div class="cuerpo-modal">
            <p>Si quieres informar de un error, rellena el siguiente area de texto describiendo con el maximo detalle posible, si necesita ayuda adicional no dude en entrar en nuestra comunidad de discord para recibir ayuda</p><br>
            @method('POST')
            @csrf
            <label for="texto">Describe el error:</label>
            <textarea name="informe" id="informe"></textarea>
            
        </div>
        <div class="footer-modal">
            <div class="botones">
            <span class="cancelar">Cancelar</span>
            <input type="submit" class="aceptar" value="Enviar">
            </div>
        </div>
        </form>
        
</div>
```

y por ultimo hay que importar el archivo de javascript de los modales para capturar las acciones que haga el usuario

```
<script src="{{ asset('js/modals.js') }}"></script>
```


## Aeropuetos

Cada aeropuerto se gestiona segun su tamaño en la vida real, su trafico, la terminal y su capacidad para gestionar diferentes aviones. Aqui se muestra una tabla con las posibles variables segun el tamaño del aeropuerto, esta tabla no se sige al 100% cada aeropuerto puede variar o tener datos mezclados. Por ejemplo, madeira es un aeropuerto muy pequeño pero con una alta demanda.

| Aeropuertos   | Espacios      | Coste O  | Demanda | Pasajeros | Categoria  |
| :------------ | :----------:  | :------: | :------:| :--------:| ---------: |
| Grandes       |   400 - 450   | 2000     | 0.97    | 300       | 1          |
| Medianos      |   200 - 250   | 1200     | 0.85    | 100       | 2          |
| Pequeños      |   50 - 100    | 500      | 0.70    | 75        | 3          |
| Muy pequeños  |   25 - 50     | 250      | 0.50    | 50        | 4          |

***
aviones que pueden volar al aeropuerto segun su categoria (ejemplo)

Categoria 1 -> a380, b747
Categoria 2 -> a350, b777
Categoria 3 -> a320, b737
Categoria 4 -> embraers y borbardiers y a319
