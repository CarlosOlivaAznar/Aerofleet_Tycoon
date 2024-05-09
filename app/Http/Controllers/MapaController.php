<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use App\Models\Ruta;
use Carbon\Carbon;

class MapaController extends Controller
{
    public function index()
    {
        $rutasUser = Ruta::where('user_id', auth()->id())->get();
        $avionesVolando = array();

        foreach ($rutasUser as $rutaUser) {
            $horaInicio = Carbon::createFromFormat('H:i:s', $rutaUser->horaInicio);
            $horaFin = Carbon::createFromFormat("H:i:s", $rutaUser->horaFin);

            // Si las horas de inicio o fin estan comprendidas entre las 00:00z y 04:00z
            // Quiere decir que ese horario ya es del dia siguiente ya que excede el limite de hora
            // Entonces se le suma un dia al horario
            // Esto sucede ya que los horarios de las rutas solo guardamos las horas y no los dias como es obvio
            if($horaInicio->between(Carbon::today()->addHours(0), Carbon::today()->addHours(4))){
                $horaInicio->addDay(1);
            }

            if($horaFin->between(Carbon::today()->addHours(0), Carbon::today()->addHours(4))){
                $horaFin->addDay(1);
            }

            // Calculamos los aviones que estan volando en estos mismos instantes
            if(now()->between($horaInicio, $horaFin) && $rutaUser->flota->estado === 1){
                array_push($avionesVolando, $rutaUser->calcularPosicion($horaInicio));
            }
        }

        $rutasArray = array();
        foreach ($rutasUser as $ruta) {
            array_push($rutasArray, [
                $ruta->espacio_departure->aeropuerto->latitud,
                $ruta->espacio_departure->aeropuerto->longitud,
                $ruta->espacio_arrival->aeropuerto->latitud,
                $ruta->espacio_arrival->aeropuerto->longitud,
            ]);
        }

        $aeropuertos = Aeropuerto::all();
        $aeropuertosArray = array();
        foreach ($aeropuertos as $aeropuerto) {
            array_push($aeropuertosArray, [
                $aeropuerto->latitud,
                $aeropuerto->longitud,
                $aeropuerto->nombre,
            ]);
        }

        return view('mapa.index', [
            'avionesVolando' => $avionesVolando, 
            'rutas' => $rutasArray, 
            'aeropuertos' => $aeropuertosArray
        ]);
    }
}
