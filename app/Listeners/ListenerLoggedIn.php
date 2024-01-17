<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Ruta;
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

        $rutas = Ruta::where('user_id', auth()->id())->get();
        // Si la diferencia es mayor que 0 hay mas de 2 dias de diferencia entre la ultima conexion y ahora
        // Calculamos todas las rutas de ese dia completo
        if($diferencia > 0){
            
        }

        // Queremos calcular la diferencia de horas por lo que el dia se pone hoy para hacer la comparacion de horas correctamente
        $horaDesconexion = Carbon::createFromTimeString($event->user->ultimaConexion)->setDate(now()->year, now()->month, now()->day);
        // Se calcula los dias de ultima conexion y ahora segun sus horas para ver que rutas son afectadas
        // Si es 0 o superior significa que por lo menos hay 2 dias diferentes en el calculo
        // Pero si es -1 significa que la desconexion y conexion ha ocurrido el mismo dia
        $arrayPrueba1 = array();
        $arrayPrueba2 = array();
        $arrayPrueba3 = array();
        if($diferencia >= 0){
            foreach($rutas as $ruta){
                $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                // Rutas del dia de desconexion
                if($hora->gt($horaDesconexion)){
                    // Rutas que su hora esta por delante de la hora de desconexion
                    array_push($arrayPrueba1, $ruta->id);
                }

                // Rutas del calculo de hoy
                if($hora->lt(now())){
                    array_push($arrayPrueba2, $ruta->id);
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

        dd($arrayPrueba1, $arrayPrueba2, $arrayPrueba3);
        dd($diferencia, $rutas);

        $event->user->ultimaConexion = now();
        $event->user->update();
    }
}
