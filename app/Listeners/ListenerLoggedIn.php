<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Ruta;
use App\Models\User;
use App\Models\BeneficiosHistorico;
use Carbon\Carbon;

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
                    $this->calcularBeneficio($ruta);
                }
            }
        }

        // Queremos calcular la diferencia de horas por lo que el dia se pone hoy para hacer la comparacion de horas correctamente
        $horaDesconexion = Carbon::createFromTimeString($event->user->ultimaConexion)->setDate(now()->year, now()->month, now()->day);
        // Se calcula los dias de ultima conexion y ahora segun sus horas para ver que rutas son afectadas
        // Si es 0 o superior significa que por lo menos hay 2 dias diferentes en el calculo
        // Pero si es -1 significa que la desconexion y conexion ha ocurrido el mismo dia
        $arrayPrueba3 = array();
        if($diferencia >= 0){
            foreach($rutas as $ruta){
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Rutas del dia de desconexion
                if($hora->gt($horaDesconexion)){
                    // Rutas que su hora esta por delante de la hora de desconexion
                    $this->calcularBeneficio($ruta);
                }

                // Rutas del calculo de hoy
                if($hora->lt(now())){
                    $this->calcularBeneficio($ruta);
                }
            }
        } elseif($diferencia == -1){
            foreach ($rutas as $ruta) {
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Calculo de las horas que estan entre la desconexion y conexion del usuario
                if($hora->between($horaDesconexion, now())){
                    array_push($arrayPrueba3, $ruta->id);
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
        $mediaDemanda = ($ruta->espacio_arrival->aeropuerto->demanda + $ruta->espacio_departure->aeropuerto->demanda) / 2;
        $pasajerosEstimados = $ruta->espacio_arrival->aeropuerto->pasajerosEstimados + $ruta->espacio_departure->aeropuerto->pasajerosEstimados;

        // Se calcula los pasajeros que van en el avion en una ruta concreta
        $pasajeros = $mediaDemanda * $pasajerosEstimados;
        if($pasajeros > $ruta->flota->avion->capacidad){
            $pasajeros = $ruta->flota->avion->capacidad;
        }

        // Ingresos de la ruta
        $ingresos = $pasajeros * 50; // (50 precio del billete)

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
    }
}
