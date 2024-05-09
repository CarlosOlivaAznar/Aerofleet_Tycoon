<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';
    protected $fillable = [
        'flota_id',
        'user_id',
        'espacio_departure_id',
        'espacio_arrival_id',
        'horaInicio',
        'horaFin',
        'distancia',
        'tiempoEstimado',
        'precioBillete',
    ];

    public function flota()
    {
        return $this->belongsTo(Flota::class);
    }

    public function espacio_departure()
    {
        return $this->belongsTo(Espacio::class);
    }

    public function espacio_arrival()
    {
        return $this->belongsTo(Espacio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calcularPosicion(Carbon $horaInicio)
    {
        $latSalida = $this->espacio_departure->aeropuerto->latitud;
        $longSalida = $this->espacio_departure->aeropuerto->longitud;

        $latLlegada = $this->espacio_arrival->aeropuerto->latitud;
        $longLlegada = $this->espacio_arrival->aeropuerto->longitud;
        
        // Diferencia de latitudes y longitudes
        $difLat = $latSalida - $latLlegada;
        $difLong = $longSalida - $longLlegada;

        $distanciaRecorrida = intval($horaInicio->diffInMinutes(now()));
        $tiempoEstimado = explode(":", $this->tiempoEstimado); 

        $porcentajeRecorrido = $distanciaRecorrida / ((intval($tiempoEstimado[0]) * 60) + intval($tiempoEstimado[1]));

        // Una vez con el porcentaje de ruta recorrido calculamos la posicion segun la diferencia de posiciones y el porcentaje
        $difLat *= $porcentajeRecorrido;
        $difLong *= $porcentajeRecorrido;

        // Calculamos la posicion final del avion
        $posLat = $latSalida - $difLat;
        $posLong = $longSalida - $difLong;

        $texto = "";
        if($this->user->id != auth()->id()){
            $texto = $this->user->nombreCompanyia;
        } else {
            $texto = $this->flota->matricula;
        }
        
        
        return [$posLat, $posLong, $texto, $this->calcularAngulo($this)];
    }

    public function calcularAngulo($ruta)
    {
        $latSalida = $ruta->espacio_departure->aeropuerto->latitud;
        $longSalida = $ruta->espacio_departure->aeropuerto->longitud;

        $latLlegada = $ruta->espacio_arrival->aeropuerto->latitud;
        $longLlegada = $ruta->espacio_arrival->aeropuerto->longitud;

        // Diferencia entre las longitudes y latitudes
        $deltaLat = $latLlegada - $latSalida;
        $deltaLon = $longLlegada - $longSalida;

        // Calcular el angulo en radianes
        $anguloRad = atan2($deltaLon, $deltaLat);

        // Transformar el angulo de radianes a grados
        $anguloGrad = rad2deg($anguloRad);

        if($anguloGrad < 0){
            $anguloGrad += 360;
        }

        return $anguloGrad;
    }
}
