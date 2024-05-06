<img src="public/images/logos/logo_AFT_icon.png" alt="Aerfleet Tycoon" width="300"/>

# Aerofleet Tycoon

Proyecto desarrollado por Carlos Oliva Aznar

## Que es Aerofleet

Aerofleet Tycoon es un videojuego de simulacion a tiempo real de una compañia aerea, en la que se puede gestionar una flota de aviones utilizando los hangares de la sede y realizando mantenimiento de las aeronaves y gestionando las rutas de la compañía aérea empleado los aviones de tu propiedad. También la gestión de los espacios de los aeropuertos y los diferentes
pagos del alquiler de la sede y el salario de los ingenieros de mantenimiento de las aeronaves

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

| Aeropuertos   | Espacios      | Coste O  | Demanda | Pasajeros | Categoria  |
| :------------ | :----------:  | :------: | :------:| :--------:| ---------: |
| Grandes       |   400 - 450   | 2000     | 0.97    | 300       | 1          |
| Medianos      |   200 - 250   | 1200     | 0.85    | 100       | 2          |
| Pequeños      |   50 - 100    | 500      | 0.70    | 75        | 3          |
| Muy pequeños  |   25 - 50     | 250      | 0.50    | 50        | 4          |

***
Categoria 1 -> a380, b747
Categoria 2 -> a350, b777
Categoria 3 -> a320, b737
Categoria 4 -> embraers y borbardiers y a319
