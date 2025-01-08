<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\Accion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Ruta;
use App\Models\User;
use App\Models\BeneficiosHistorico;
use App\Models\Flota;
use App\Models\Prestamo;
use App\Models\Sede;
use App\Services\decodificadorMETAR;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ListenerLoggedIn
{

    private $metarService = null;

    public function __construct(decodificadorMETAR $decodificadorMETAR)
    {
        $this->metarService = $decodificadorMETAR;
    }

    /**
     * Cuando el usuario se logea salta esta funcion (eventos añadidos en AuthenticicatedSessionController y RedirectIfAuthenticated)
     */
    public function handle(UserLoggedIn $event): void
    {
        // Se aumenta el tiempo de ejecucion del script de php
        set_time_limit(300);

        // Si el usuario no se ha logeado ninguna vez no se ejecuta esta funcion
        if(!Sede::where('user_id', $event->user->id)->first()){
            // Actualizamos la fecha actual
            $event->user->ultimaConexion = now();
            $event->user->update();
            return;
        }

        $ultimaConexion = Carbon::createFromTimeString($event->user->ultimaConexion);
        $fechaActual = now();

        // Creamos la variable de sesion nueva para mostrar los datos de los vuelos
        if(!Session::get('infoAviones', [])){
            Session::put('infoAviones', []);
        }

        // Creamos la variable de sesion nueva para mostrar los mensajes importantes para el usuario
        if(!Session::get('mensajeVuelos', [])){
            Session::put('mensajeVuelos', []);
        }
        
        // Solo hay que calcular la diferencia de dias, en algunos casos las horas producen inconsistencias
        // y una hora de diferencia puede añadir un dia mas o menos.
        // Por eso calculamos la diferencia con la misma hora en las 2
        $ultimaConexion->setHour(1)->setMinute(0)->setSecond(0);
        $fechaActual->setHour(1)->setMinute(0)->setSecond(0);

        $desconexion = Carbon::createFromTimeString($event->user->ultimaConexion);

        // calculamos los dias que hay entre medio de las 2 fechas
        $diferencia = $ultimaConexion->diffInDays($fechaActual) - 1;
        // Pruebas
        error_log("Dias que ha estado el usuario sin conectarse: $diferencia");

        $rutas = Ruta::where('user_id', auth()->id())->get();
        // Si la diferencia es mayor que 0 hay mas de 2 dias de diferencia entre la ultima conexion y ahora
        // Calculamos todas las rutas de ese dia completo
        if($diferencia > 0){

            // Comprobamos que los aviones que se tienen que activar
            $this->activarAviones();
            
            $fechaDesconexion = Carbon::createFromTimeString($event->user->ultimaConexion)->addDay();

            for ($i=0; $i < $diferencia; $i++) {
                foreach ($rutas as $ruta) {
                    if($ruta->flota->estado == 1){
                        $this->calcularBeneficio($ruta, $fechaDesconexion);
                    }
                }
                // Actualizamos por dia el mantenimiento de los aviones
                $this->mantenimiento();

                // Restamos los gastos mensuales
                $this->gastosMensuales();

                // Control de leasings
                $this->controlLeasing();

                // Cobrar Prestamos
                $this->cobrarPrestamos();

                $fechaDesconexion->addDay();
            }
        }

        // Queremos calcular la diferencia de horas por lo que el dia se pone hoy para hacer la comparacion de horas correctamente
        $horaDesconexion = Carbon::create($desconexion)->setDate(now()->year, now()->month, now()->day);
        // Se calcula los dias de ultima conexion y ahora segun sus horas para ver que rutas son afectadas
        // Si es 0 o superior significa que por lo menos hay 2 dias diferentes en el calculo
        // Pero si es -1 significa que la desconexion y conexion ha ocurrido el mismo dia
        if($diferencia >= 0){

            // Comprobamos que los aviones que se tienen que activar
            $this->activarAviones();

            foreach($rutas as $ruta){
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Rutas del dia de desconexion
                if($hora->gt($horaDesconexion) && $ruta->flota->estado == 1){
                    // Rutas que su hora esta por delante de la hora de desconexion
                    $this->calcularBeneficio($ruta, now());
                }

                // Rutas del calculo de hoy
                if($hora->lt(now()) && $ruta->flota->estado == 1){
                    $this->calcularBeneficio($ruta, now());
                }
            }

            // Solo por el ultimo dia de conexion calculamos el mantenimiento
            $this->mantenimiento();

            // Restamos los gastos mensuales
            $this->gastosMensuales();

            // Control de leasings
            $this->controlLeasing();

            // Cobrar Prestamos
            $this->cobrarPrestamos();

        } elseif($diferencia == -1){
            foreach ($rutas as $ruta) {
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Calculo de las horas que estan entre la desconexion y conexion del usuario
                if($hora->between($horaDesconexion, now()) && $ruta->flota->estado == 1){
                    $this->calcularBeneficio($ruta, now());
                }
            }
        }

        $this->controlBeneficios();;

        // Para calcular beneficios del usuario guardamos su saldo una vez completado los ingresos de las rutas, solo si son dias diferentes
        if($diferencia > -1) {
            BeneficiosHistorico::create([
                'user_id' => auth()->id(),
                'saldo' => $event->user->patrimonio(),
                'fecha' => now(),
            ]);
        }


        $event->user->ultimaConexion = now();
        $event->user->update();
    }

    public function calcularBeneficio($ruta, $diaDesconexion)
    {
        // Calcula el beneficio de una ruta segun la demanda, los pasajeros estimados de la ruta y la demanda de la ruta
        // Primero calculamos la demanda de los dos aeropuertos destino y llegada
        $mediaDemanda = ($ruta->espacio_arrival->aeropuerto->demanda + $ruta->espacio_departure->aeropuerto->demanda) / 2;
        $pasajerosEstimados = $ruta->espacio_arrival->aeropuerto->pasajerosEstimados + $ruta->espacio_departure->aeropuerto->pasajerosEstimados;

        // Se genera un plus de demanda segun la distancia
        // Cada 500 km recorridos en la ruta se añade un 0.1 de demanda
        $mediaDemanda += floor(($ruta->distancia / 500)) * 0.1;

        // Se calcula la demanda segun el precio del billete
        // Se calcula como precio base 75 que ni aumenta ni disminuye la demanda
        // cada 6 euros de subida en el precio del billete se reducira 0.01 la demanda 
        // y cada 6 euros de bajada la demanda aumenta 0.01
        $mediaDemanda += ((75 - $ruta->precioBillete) / 6) * 0.01;



        /**
         * Se cuenta cuantas rutas similares exiten contando las del usuario registrado
         * y por cada ruta similar se resta 0.005 de la demanda de la ruta
         */
        error_log("demanda antes del calculo de la competencia: $mediaDemanda");
        $grupoRutas = Ruta::join('espacios as e', 'rutas.espacio_departure_id', '=', 'e.id')
            ->join('espacios as es', 'rutas.espacio_arrival_id', '=', 'es.id')
            ->where('e.aeropuerto_id', $ruta->espacio_departure->aeropuerto->id)
            ->where('es.aeropuerto_id', $ruta->espacio_arrival->aeropuerto->id)
            ->select('rutas.*')
            ->get();
        $mediaDemanda -= count($grupoRutas) * 0.005;
        error_log("demanda despues del calculo de la competencia: $mediaDemanda");


        // Se calcula los pasajeros que van en el avion en una ruta concreta
        $pasajeros = intval($mediaDemanda * $pasajerosEstimados);
        
        // Comprobacion para que los pasajeros no superen la capacidad del avion
        $avionLleno = false;
        if($pasajeros > $ruta->flota->avion->capacidad){
            // Variable para manejar mensaje de avion lleno, si el avion va un 108% se guarda en una variable para mas tarde
            // guardar un mensaje de aviso al jugador
            if($pasajeros > $ruta->flota->avion->capacidad * 1.08) $avionLleno = true;

            // Ajustamos los pasajeros para que no superen la capacidad del avion
            $pasajeros = $ruta->flota->avion->capacidad;
            
        } else if($pasajeros < 0){
            // Cuando los pasajeros sean menos de 0, un avion no puede tener pasajeros negativos
            $pasajeros = 0;
        }

        // Ingresos de la ruta
        $ingresos = $pasajeros * $ruta->precioBillete;

        // Calculamos los gastos
        // Gastos por costes operacionales de los aeropuertos de destino y llegada
        $gastos = $ruta->espacio_departure->aeropuerto->costeOperacional + $ruta->espacio_arrival->aeropuerto->costeOperacional;

        // Gastos por el uso del avion
        $gastos += $ruta->flota->avion->costePorKm * $ruta->distancia;

        // Variable que controla si ha habido un evento
        // en el caso de haberlo queremos no mostrar ciertos mensaje de informacion, por ejemplo si el avion tiene un evento aleatorio de perder los ingresos
        // saltara un mensaje de que el avion esta generando perdidas. Esta variable controla que no se muestre este ultimo mensaje
        $eventoAleatorio = false;

        // ---- control del METAR ----
        $this->metar($ingresos, $gastos, $ruta, $diaDesconexion, $eventoAleatorio);

        // ---- Eventos Aleatorios ---
        // Antes de calcular el beneficio de la ruta se mira si ha podido suceder algun imprevisto en la ruta
        $this->eventosAleatorios($ingresos, $gastos, $ruta, $eventoAleatorio);


        // Calculamos el beneficio de la ruta
        $beneficio = intval($ingresos - $gastos);
        // Pruebas para comprobar que todo funciona bien
        error_log("La ruta: $ruta->id, con una demanda de ($pasajerosEstimados) $mediaDemanda y con $pasajeros pasajeros. Tiene un beneficio de $beneficio, ($ingresos ingresos, $gastos gastos)");

        $user = User::where('id', auth()->id())->first();

        // Control de propiedad de la empresa y reparto de beneficios
        if($user->sede->porcentajeVenta > 0 && $user->sede->porcentajeComprado > 0){
            $propietarios = Accion::where('sede_id', $user->sede->id)->get();

            foreach ($propietarios as $propietario) {
                $propietario->user->saldo += $beneficio * $propietario->accionesCompradas;
                $propietario->user->update();

                $propietario->beneficios += $beneficio * $propietario->accionesCompradas;
                $propietario->update();
            }
        }

        // Multiplicamos los beneficios por el el porcentaje que no tiene en propiedad el usuario
        $user->saldo += $beneficio * (1 - $user->sede->porcentajeVenta);
        $user->update();

        // Guardamos la fecha de desconexion respecto a la hora de finalizacion del vuelo
        // Se hace esto para proteger en caso de error del script y se guarde el ultimo punto en el que se calculo la ruta
        $horasFinRuta = explode(":", $ruta->horaFin);
        
        $user->ultimaConexion = $diaDesconexion->setHour($horasFinRuta[0])->setMinute($horasFinRuta[1])->setSecond(0);
        $user->update();

        // Obtenemos la variable de sesion de mensaje vuelos
        $mensajeVuelos = Session::get('mensajeVuelos', []);

        // Reducimos el estado del avion porque ha completado un vuelo
        // Si el avion es de leasing no se resta la condicion ya que corre a cargo de la empresa de leasing
        if(!$ruta->flota->leasing){
            $ruta->flota->condicion -= 0.05;
            if($ruta->flota->condicion < 5){
                $ruta->flota->estado = 0;
                array_push($mensajeVuelos, 
                [trans('home.thePlane') . " ". $ruta->flota->matricula ." ". trans('home.depCond'),
                3]);
            }
            $ruta->flota->update();
        }


        // Se añade la informacion de los aviones para dar feedback al usuario
        $ruta->flota->rutasCompletadas++;
        $horas = explode(":", $ruta->tiempoEstimado);
        $ruta->flota->horasCompletadas += $horas[0] + $horas[1] / 60;
        if($ruta->flota->distanciaCompletada + $ruta->distancia >= 999999){
            $ruta->flota->distanciaCompletada = 999999;
        } else {
            $ruta->flota->distanciaCompletada += $ruta->distancia;
        }
        
        $ruta->flota->update();

        // Guardamos informacion de los vuelos para que el usuario tenga feedback
        $infoAviones = Session::get('infoAviones', []);
        array_push($infoAviones, trans('home.thePlane') ." ". $ruta->flota->matricula ." ". trans('home.wRoute') ." ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " . trans('home.startTime') . " $ruta->horaInicio " .trans('home.completedFlight'). " $pasajeros " .trans('home.passengers'). " $beneficio " .trans('home.income'). " $ingresos, " .trans('home.expenses'). " ". number_format($gastos, 2, ',', '.') .")");
        Session::put('infoAviones', $infoAviones);

        $economiaVuelos = Session::get('economiaVuelos', []);
        $economiaVuelos[$ruta->id] = [
            'ingresos' => $ingresos,
            'gastos' => $gastos,
            'beneficio' => $beneficio,
        ];
        Session::put('economiaVuelos', $economiaVuelos);

        // Obtenemos la variable de mensajes para que el usuario tenga informacion de los vuelos y fallos que pueda corregir
    if($beneficio < 0 && !$eventoAleatorio){
            array_push($mensajeVuelos, 
            [trans('home.thePlane') . " ". $ruta->flota->matricula ." ". trans('home.wRoute') ." ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " . trans('home.startTime'). " $ruta->horaInicio " . trans('home.losses'),
            3]);
        }

        if($avionLleno){
            array_push($mensajeVuelos, 
            [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.fullPlane'),
            1]);
        }

        if($ruta->flota->avion->capacidad*0.25 > $pasajeros){
            array_push($mensajeVuelos, 
            [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.fewPassengers'),
            2]);
        }

        if($pasajeros <= 0){
            array_push($mensajeVuelos, 
            [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.emptyPlane'),
            3]);
        }

        Session::put('mensajeVuelos', $mensajeVuelos);
    }

    public function mantenimiento()
    {
        $flotaMantenimiento = Flota::where('user_id', auth()->id())->where('estado', 2)->get();
        $sede = Sede::where('user_id', auth()->id())->first();
        $mensajeVuelos = Session::get('mensajeVuelos', []);

        foreach ($flotaMantenimiento as $avion) {
            if($avion->condicion < 100){
                // Realizamos el mantenimiento al avion
                // Para los mantenimientos se calcula dividiendo los ingenieros por los aviones en mantenimiento
                $avion->condicion += $sede->ingenieros / count($flotaMantenimiento);
                $avion->update();

                // Si el avion supera el año de antiguedad se añadira un plus de dinero por mantenerlo
                if(date($avion->fechaDeFabricacion) > now()->subYear()){
                    $user = User::find(auth()->id());
                    $user->saldo -= 750 * now()->subYear()->diffInYears(date($avion->fechaDeFabricacion));
                    $user->update();
                }
            } else {
                // creamos el mensaje de que el avion ha completado el mantenimiento
                array_push($mensajeVuelos, 
                [trans('home.thePlane') ." $avion->matricula " . trans('home.maintenance.Comp'),
                2]);
            }
        }

        // Primera condicion para no dividir por 0
        if(count($flotaMantenimiento) != 0 && $sede->ingenieros / count($flotaMantenimiento) < 0.33){
            array_push($mensajeVuelos, 
            [trans('home.hireEng'),
            3]);
        }

        Session::put('mensajeVuelos', $mensajeVuelos);
        error_log("Realizando manteniemiento a los aviones");
    }

    /**
     * Funcion que cobra los gastos mensuales del usuario, en vez de cobrar mes por mes, lo cobra dia a dia
     * haciendo la division por 30
     */
    public function gastosMensuales()
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $user = User::find(auth()->id());
        $user->saldo -= $sede->costesTotales() / 30;
        $user->update();
        error_log("Se ha cobrado los gastos diarios " . $sede->costesTotales() / 30);
    }

    /**
     * Esta funcion se utiliza para hacer control de los beneficios por usuario, cada uno puede tener maximo 10 registros para
     * visualizar sus beneficios, si no se podria saturar las grafias y la tabla de registros. Si tiene mas de 10 registros
     * se eliminan la mitad de ellos
     */
    public function controlBeneficios()
    {
        $beneficiosHistoricos = BeneficiosHistorico::where('user_id', auth()->id())->get();
        if(count($beneficiosHistoricos) > 10){
            for ($i=0; $i < count($beneficiosHistoricos); $i++) { 
                if($i % 2 === 1){
                    $beneficiosHistoricos[$i]->delete();
                }
            }
        }
    }

    /**
     * Funcion que comprueba los aviones que se tienen que activar para pasarlos al estado 1 de en ruta
     */
    public function activarAviones()
    {
        $avionesActivar = Flota::where('user_id', auth()->id())->where('estado', 3)->get();

        foreach ($avionesActivar as $avionActivar) {
            if(date($avionActivar->activacion) <= now()){
                $avionActivar->estado = 1;
                $avionActivar->update();
                error_log("Activando avion $avionActivar->id");
            }
        }
    }

    /**
     * Funcion que controla el leasing del usuario
     */
    public function controlLeasing()
    {
        $flotaLeasing = Flota::where('user_id', auth()->id())->where('leasing', 1)->get();

        foreach ($flotaLeasing as $avion) {
            $fechaFin = Carbon::createFromFormat('Y-m-d', $avion->finLeasing)->setHours(0)->setMinutes(0)->setSeconds(1);
            $fechaDesconexion = Carbon::createFromTimeString(User::where('id', auth()->id())->first()->ultimaConexion);
            if($fechaFin->gt($fechaDesconexion) || $fechaFin->eq($fechaDesconexion)){
                $user = User::where('id', auth()->id())->first();
                $user->saldo -= $avion->avion->leasePPD();
                error_log("Dia de desconexion: $fechaDesconexion");
                error_log("Cobrando leasing del avion $avion->id, precio por dia: " . $avion->avion->leasePPD());
                $user->update();
            } else {
                // Elimina el avion si se ha superado la fecha de leasing
                error_log("Eliminando avion $avion->id por fin del leasing");
                $avion->delete();
            }
        }
    }

    /**
     * Control de eventos aleatorios
     */
    public function eventosAleatorios(&$ingresos, &$gastos, &$ruta, &$eventoAleatorio)
    {
        // Todos los eventos posibles con su probabilidad
        $mensajeVuelos = Session::get('mensajeVuelos', []);
        $eventos = [
            "retrasoVuelo" => 2,
            "falloMecanico" => 0.5,
            "huelgaAeropuerto" => 0.3,
            "aumentoDemanda" => 0.5,
            "perdidaEquipaje" => 1,
            "impactoAve" => 0.1,
            "pasajeroProblematico" => 0.2,
            "personaEnferma" => 0.4,
            "impactosMenores" => 2.5,
        ];

        $eventosOcurridos = array();
        

        foreach ($eventos as $nombre => $probabilidad) {
            $numeroAleatorio = mt_rand(0, 10000) / 100;

            // Si el numero aleatorio esta dentro de la probabilidad de ocurrir, el evento lo guardamos en eventosOcurridos
            if ($probabilidad >= $numeroAleatorio ) {
                array_push($eventosOcurridos, $nombre);
            }
        }

        // se ejecutan los eventos
        foreach ($eventosOcurridos as $evento) {
            switch ($evento) {
                case 'retrasoVuelo':
                    $ingresos *= 0.75;

                    // Guardamos el mensaje
                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.retrasoVuelo'),
                    3]);
                    break;
                case 'falloMecanico':
                    $moneda = mt_rand(0,1);

                    if($moneda === 0){
                        $gastosReparacion = mt_rand(3500, 6000);
                        $gastos += $gastosReparacion;
                        $eventoAleatorio = true;

                        array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.falloMecanico1') . ' ' . $gastosReparacion,
                    3]);

                    } else if($moneda === 1){
                        $ingresos = 0;
                        $eventoAleatorio = true;
                        
                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.falloMecanico2'),
                    3]);
                    }
                    break;
                case 'huelgaAeropuerto':
                    $ingresos *= 0.75;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.huelgaAeropuerto'),
                    3]);
                    
                    break;
                case 'aumentoDemanda':
                    $aumentoDemanda = mt_rand(5, 25) / 100 + 1;
                    $ingresos *= $aumentoDemanda;
                    $aumentoDemanda = ($aumentoDemanda - 1) * 100;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.aumentoDemanda') . ' ' . $aumentoDemanda . '%',
                    2]);
                    
                    break;
                case 'perdidaEquipaje':
                    $perdidaEquipajesPorcentaje = mt_rand(5, 30);
                    $perdidaEquipajes = 1 - ($perdidaEquipajesPorcentaje / 100);
                    $ingresos *= $perdidaEquipajes;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.perdidaEquipaje') . ' ' . $perdidaEquipajesPorcentaje . '%',
                    3]);
                    
                    break;
                case 'impactoAve':
                    $reparacion = mt_rand(2000,12000);
                    $gastos += $reparacion;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.impactoAve') . ' ' . $reparacion . '€',
                    3]);
                    
                    break;
                case 'pasajeroProblematico':
                    $pagoAeropuerto = mt_rand(750, 2500);
                    $ingresos *= 0.75;
                    $eventoAleatorio = true;
                    $gastos += $pagoAeropuerto;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.pasajeroProblematico') . ' ' . $pagoAeropuerto . '€',
                    3]);
                    
                    break;
                case 'personaEnferma':
                    $pagoAeropuerto = mt_rand(750, 2500);
                    $ingresos *= 0.80;
                    $gastos += $pagoAeropuerto;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.personaEnferma') . ' ' . $pagoAeropuerto . '€',
                    3]);
                    
                    break;
                case 'impactosMenores':
                    $danyos = mt_rand(1,4);
                    if($ruta->flota->condicion - $danyos < 0.05){
                        $ruta->flota->condicion -= $danyos;
                    }

                    $ruta->flota->update();

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.impactosMenores') . ' ' . $danyos . '%',
                    3]);

                    break;
                    
            }
        }

        // Guardamos los mensajes
        Session::put('mensajeVuelos', $mensajeVuelos);
    }

    /**
     * El metar es un sistema estandarizado en la aviacion para hacer reportes meteorologicos y que todo el mundo pueda entenderlo de manera sencilla.
     * Se trata de unos bloques de texto que muestran informacion, para mas informacion: https://www.oneair.es/metar-reporte-meteorologico-aeropuertos/
     * En la aplicacion se utilizan las condiciones meteorologicas reales para dar realismo y ese toque de simulador y que puedan afectar a los vuelos del usuario
     * 
     * METARS DE EJMPLO PARA HACER TESTS:
     * METAR LPMR 020900Z VRB01KT CAVOK 13/11 Q1023
     * METAR LFOT 021000Z AUTO 27007KT 9999 BKN010 OVC015 13/11 Q1019 TEMPO BKN014 SCT020TCU
     * METAR LEZG 020900Z 07004KT 040V110 0150 R30R/0450N R12R/0300N R30L/0325N R12L/0400N FG VV001 08/08 Q1025 NOSIG
     */
    function metar(&$ingresos, &$gastos, &$ruta, Carbon $diaDesconexion, &$eventoAleatorio) 
    {
        $mensajeVuelos = Session::get('mensajeVuelos', []);
      
        if($diaDesconexion->day == now()->day && $diaDesconexion->month == now()->month){
            $dateOrigen = now()->format('Ymd') . "_" . Carbon::createFromFormat('H:i:s', $ruta->horaInicio)->format('Hi00') . "Z";
            $dateDestino = now()->format('Ymd') . "_" . Carbon::createFromFormat('H:i:s', $ruta->horaFin)->format('Hi00') . "Z";
            $metarOrigen = $this->getMetar($ruta->espacio_departure->aeropuerto->icao, $dateOrigen);
            $metarDestino = $this->getMetar($ruta->espacio_arrival->aeropuerto->icao, $dateDestino);
        }

        // Eventos generados por las condiciones meteorologicas en el aeropuerto de origen
        if(isset($metarOrigen["wind"]["speed"]) && $metarOrigen["wind"]["speed"] > 45) {
            $randomNumber = rand(1, 3);

            switch ($randomNumber) {
                case 1:
                    $ingresos *= .9;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windDepEvent1'),
                    3]);
                    break;
                case 2:
                    $ingresos *= .7;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windDepEvent2'),
                    3]);
                    break;
                case 3:
                    $ingresos *= 0;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windDepEvent3'),
                    3]);
                    break;
                default:
                    $ingresos *= .9;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windDepEvent1'),
                    3]);
                    break;
            }
        }

        if(isset($metarOrigen["visibility"]) && $metarOrigen["visibility"] < 150) {
            $randomNumber = rand(1, 3);

            switch ($randomNumber) {
                case 1:
                    $ingresos *= .9;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visDepEvent1'),
                    3]);
                    break;
                case 2:
                    $ingresos *= .6;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visDepEvent2'),
                    3]);
                    break;
                case 3:
                    $ingresos *= 0;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visDepEvent3'),
                    3]);
                    break;
                default:
                    $ingresos *= .9;
                    $eventoAleatorio = true;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visDepEvent1'),
                    3]);
                    break;
            }
        }


        // Eventos generados por las condiciones meteorologicas en el aeropuerto de destino
        if(isset($metarDestino["wind"]["speed"]) && $metarDestino["wind"]["speed"] > 33) {
            $randomNumber = rand(1, 3);

            switch ($randomNumber) {
                case 1:
                    $ingresos *= .9;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windArrEvent1'),
                    3]);
                    break;
                case 2:
                    $gastosAdicionales = rand(1500, 6000);
                    $gastos += $gastosAdicionales;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windArrEvent2') . " " . $gastosAdicionales,
                    3]);
                    break;
                case 3:
                    $gastosAdicionales = rand(3500, 8000);
                    $gastos += $gastosAdicionales;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windArrEvent3') . " " .$gastosAdicionales,
                    3]);
                    break;
                default:
                    $ingresos *= .9;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.windArrEvent1'),
                    3]);
                    break;
            }
        }

        if(isset($metarDestino["visibility"]) && $metarDestino["visibility"] < 400) {
            $randomNumber = rand(1, 3);

            switch ($randomNumber) {
                case 1:
                    $ingresos *= .9;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visArrEvent1'),
                    3]);
                    break;
                case 2:
                    $gastosAdicionales = rand(1500, 6000);
                    $gastos += $gastosAdicionales;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visArrEvent2') . " " . $gastosAdicionales,
                    3]);
                    break;
                case 3:
                    $gastosAdicionales = rand(3500, 8000);
                    $gastos += $gastosAdicionales;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visArrEvent3') . " " . $gastosAdicionales,
                    3]);
                    break;
                default:
                    $ingresos *= .9;

                    array_push($mensajeVuelos, 
                    [trans('home.thePlane') ." ". $ruta->flota->matricula ." " .trans('home.wRoute'). " ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " " .trans('home.startTime'). " $ruta->horaInicio " . trans('home.visArrEvent1'),
                    3]);
                    break;
                    break;
            }
        }

        // Guardamos los mensajes
        Session::put('mensajeVuelos', $mensajeVuelos);
    }

    function getMetar($icao, $date)
    {
        $metarInfo = Http::get("https://aviationweather.gov/api/data/metar?ids=$icao&date=$date")->body();
        error_log("Se ha obtenido el metar $metarInfo");
        return $this->metarService->decode($metarInfo);
    }

    function cobrarPrestamos()
    {
        $prestamos = Prestamo::where('user_id', auth()->id())->get();
        $user = User::find(auth()->id());

        foreach ($prestamos as $prestamo) {
            $cuota = $prestamo->cuotaPorDia();

            if($prestamo->devuelto + $cuota >= $prestamo->prestamo){
                $user->saldo -= $prestamo->prestamo - $prestamo->devuelto;

                $user->update();
                $prestamo->delete();

                error_log("Prestamo devuelto la ultima cuota ha sido de " . $prestamo->prestamo - $prestamo->devuelto);
            } else {
                $prestamo->devuelto += $cuota;
                $prestamo->update();
    
                $user->saldo -= $cuota;
                $user->update();

                error_log("Cobrando cuota de prestamo $cuota");
            }
        }
    }
}
