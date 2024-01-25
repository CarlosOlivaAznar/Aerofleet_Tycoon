<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruta;
use Carbon\Carbon;

class MapaController extends Controller
{
    public function index()
    {
        $rutasUser = Ruta::where('user_id', auth()->id())->get();
        $avionesVolando = array();
        // Comprobamos que avion esta ahora mismo en vuelo
        foreach ($rutasUser as $rutaUser) {
            $horaInicio = Carbon::createFromFormat('H:i:s', $rutaUser->horaInicio);
            $horaFin = Carbon::createFromFormat("H:i:s", $rutaUser->horaFin);
            if(now()->between($horaInicio, $horaFin)){
                array_push($avionesVolando, $this->calcularPosicion($rutaUser, $horaInicio));
            }
        }
        
        return view('mapa.index', ['avionesVolando' => $avionesVolando]);
    }

    public function calcularPosicion($ruta, Carbon $horaInicio)
    {
        $latSalida = $ruta->espacio_departure->aeropuerto->latitud;
        $longSalida = $ruta->espacio_departure->aeropuerto->longitud;

        $latLlegada = $ruta->espacio_arrival->aeropuerto->latitud;
        $longLlegada = $ruta->espacio_arrival->aeropuerto->longitud;
        
        // Diferencia de latitudes y longitudes
        $difLat = $latSalida - $latLlegada;
        $difLong = $longSalida - $longLlegada;

        $distanciaRecorrida = intval($horaInicio->diffInMinutes(now()));
        $tiempoEstimado = explode(":", $ruta->tiempoEstimado); 

        $porcentajeRecorrido = $distanciaRecorrida / ((intval($tiempoEstimado[0]) * 60) + intval($tiempoEstimado[1]));

        // Una vez con el porcentaje de ruta recorrido calculamos la posicion segun la diferencia de posiciones y el porcentaje
        $difLat *= $porcentajeRecorrido;
        $difLong *= $porcentajeRecorrido;

        // Calculamos la posicion final del avion
        $posLat = $latSalida - $difLat;
        $posLong = $longSalida - $difLong;
        $maticula = $ruta->flota->matricula;
        
        return [$posLat, $posLong, "$maticula"];
    }
}
