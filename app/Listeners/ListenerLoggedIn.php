<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Ruta;
use App\Models\User;
use App\Models\BeneficiosHistorico;
use App\Models\Flota;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ListenerLoggedIn
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Cuando el usuario se logea salta esta funcion (eventos añadidos en AuthenticicatedSessionController y RedirectIfAuthenticated)
     */
    public function handle(UserLoggedIn $event): void
    {
        $ultimaConexion = Carbon::createFromTimeString($event->user->ultimaConexion);
        $fechaActual = now();

        // Creamos la variable de sesion nueva para mostrar los datos de los vuelos
        Session::put('infoAviones', []);

        // Creamos la variable de sesion nueva para mostrar los mensajes importantes para el usuario
        Session::put('mensajeVuelos', []);
        
        // Solo hay que calcular la diferencia de dias, en algunos casos las horas producen inconsistencias
        // y una hora de diferencia puede añadir un dia mas o menos.
        // Por eso calculamos la diferencia con la misma hora en las 2
        $ultimaConexion->setHour(1)->setMinute(0)->setSecond(0);
        $fechaActual->setHour(1)->setMinute(0)->setSecond(0);

        // calculamos los dias que hay entre medio de las 2 fechas
        $diferencia = $ultimaConexion->diffInDays($fechaActual) - 1;
        // Pruebas
        error_log("Dias que ha estado el usuario sin conectarse: $diferencia");

        $rutas = Ruta::where('user_id', auth()->id())->get();
        // Si la diferencia es mayor que 0 hay mas de 2 dias de diferencia entre la ultima conexion y ahora
        // Calculamos todas las rutas de ese dia completo
        if($diferencia > 0){
            for ($i=0; $i < $diferencia; $i++) { 
                foreach ($rutas as $ruta) {
                    if($ruta->flota->estado == 1){
                        $this->calcularBeneficio($ruta);
                    }
                }
                // Actualizamos por dia el mantenimiento de los aviones
                $this->mantenimiento();
            }
        }

        // Queremos calcular la diferencia de horas por lo que el dia se pone hoy para hacer la comparacion de horas correctamente
        $horaDesconexion = Carbon::createFromTimeString($event->user->ultimaConexion)->setDate(now()->year, now()->month, now()->day);
        // Se calcula los dias de ultima conexion y ahora segun sus horas para ver que rutas son afectadas
        // Si es 0 o superior significa que por lo menos hay 2 dias diferentes en el calculo
        // Pero si es -1 significa que la desconexion y conexion ha ocurrido el mismo dia
        if($diferencia >= 0){
            foreach($rutas as $ruta){
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Rutas del dia de desconexion
                if($hora->gt($horaDesconexion) && $ruta->flota->estado == 1){
                    // Rutas que su hora esta por delante de la hora de desconexion
                    $this->calcularBeneficio($ruta);
                }

                // Rutas del calculo de hoy
                if($hora->lt(now()) && $ruta->flota->estado == 1){
                    $this->calcularBeneficio($ruta);
                }
            }

            // Solo por el ultimo dia de conexion calculamos el mantenimiento
            $this->mantenimiento();

        } elseif($diferencia == -1){
            foreach ($rutas as $ruta) {
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Calculo de las horas que estan entre la desconexion y conexion del usuario
                if($hora->between($horaDesconexion, now()) && $ruta->flota->estado == 1){
                    $this->calcularBeneficio($ruta);
                }
            }
        }

        // Para calcular beneficios del usuario guardamos su saldo una vez completado los ingresos de las rutas
        BeneficiosHistorico::create([
            'user_id' => auth()->id(),
            'saldo' => $event->user->saldo,
            'fecha' => now(),
        ]);

        $event->user->ultimaConexion = now();
        $event->user->update();
    }

    public function calcularBeneficio($ruta)
    {
        // Calcula el beneficio de una ruta segun la demanda, los pasajeros estimados de la ruta y la demanda de la ruta
        // Primero calculamos la demanda de los dos aeropuertos destino y llegada
        $mediaDemanda = ($ruta->espacio_arrival->aeropuerto->demanda + $ruta->espacio_departure->aeropuerto->demanda) / 2;
        $pasajerosEstimados = $ruta->espacio_arrival->aeropuerto->pasajerosEstimados + $ruta->espacio_departure->aeropuerto->pasajerosEstimados;

        // Se genera un plus de demanda segun la distancia
        // Cada 500 km recorridos en la ruta se añade un 0.1 de demanda
        $mediaDemanda += floor(($ruta->distancia / 500)) * 0.1;

        // Se calcula la demanda segun el precio del billete
        // Se calcula como precio base 50 que ni aumenta ni disminuye la demanda
        // cada 4 euros de subida en el precio del billete se reducira 0.01 la demanda 
        // y cada 4 euros de bajada la demanda aumenta 0.01
        $mediaDemanda += ((50 - $ruta->precioBillete) / 4) * 0.01;


        // Se calcula los pasajeros que van en el avion en una ruta concreta
        $pasajeros = $mediaDemanda * $pasajerosEstimados;
        // Comprobacion para que los pasajeros no superen la capacidad del avion
        if($pasajeros > $ruta->flota->avion->capacidad){
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

        // Calculamos el beneficio de la ruta
        $beneficio = intval($ingresos - $gastos);
        // Pruebas para comprobar que todo funciona bien
        error_log("La ruta: $ruta->id, con una demanda de ($pasajerosEstimados) $mediaDemanda y con $pasajeros pasajeros. Tiene un beneficio de $beneficio, ($ingresos ingresos, $gastos gastos)");

        $user = User::where('id', auth()->id())->first();
        $user->saldo += $beneficio;
        $user->update();

        // Guardamos informacion de los vuelos para que el usuario tenga feedback
        $infoAviones = Session::get('infoAviones', []);
        array_push($infoAviones, "El avion ". $ruta->flota->matricula ." con la ruta ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " con la hora de inicio a las $ruta->horaInicio ha completado el vuelo con $pasajeros pasajeros y tiene un beneficio de $beneficio (ingresos: $ingresos, gastos: $gastos)");
        Session::put('infoAviones', $infoAviones);

        // Obtenemos la variable de mensajes para que el usuario tenga informacion de los vuelos y fallos que pueda corregir
        $mensajeVuelos = Session::get('mensajeVuelos', []);
        if($beneficio < 0){
            array_push($mensajeVuelos, 
            ["El avion ". $ruta->flota->matricula ." con la ruta ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " con la hora de inicio a las $ruta->horaInicio esta generando perdidas, considere reducir el precio de los billetes",
            3]);
        }

        if($pasajeros === $ruta->flota->avion->capacidad){
            array_push($mensajeVuelos, 
            ["El avion ". $ruta->flota->matricula ." con la ruta ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " con la hora de inicio a las $ruta->horaInicio esta completando la ruta con el avion lleno, considere aumentar el precio de los billetes",
            1]);
        }

        if($ruta->flota->avion->capacidad*0.25 > $pasajeros){
            array_push($mensajeVuelos, 
            ["El avion ". $ruta->flota->matricula ." con la ruta ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " con la hora de inicio a las $ruta->horaInicio esta completando la ruta con muy pasajeros, considere bajar los precios de los billetes",
            2]);
        }

        if($pasajeros <= 0){
            array_push($mensajeVuelos, 
            ["El avion ". $ruta->flota->matricula ." con la ruta ". $ruta->espacio_departure->aeropuerto->icao ."-". $ruta->espacio_arrival->aeropuerto->icao . " con la hora de inicio a las $ruta->horaInicio esta completando la ruta vacio, no tiene ningun pasajero, considere cambiar la ruta o bajar los precios de los billetes",
            3]);
        }

        Session::put('mensajeVuelos', $mensajeVuelos);
    }

    public function mantenimiento()
    {
        $flotaMantenimiento = Flota::where('user_id', auth()->id())->where('estado', 2)->get();

        foreach ($flotaMantenimiento as $avion) {
            $avion->condicion += 1;
            $avion->update();
        }
        error_log("Realizando manteniemiento a los aviones");
    }
}
