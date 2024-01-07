<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';
    protected $fillable = [
        'flota_id',
        'espacio_departure_id',
        'espacio_arrival_id',
        'horaInicio',
        'horaFin',
        'distancia',
        'tiempoEstimado',
    ];

    public function flota()
    {
        $this->belongsTo(Ruta::class);
    }

    public function espacioDep()
    {
        $this->belongsTo(Espacio::class);
    }

    public function espacioArr()
    {
        $this->belongsTo(Espacio::class);
    }
}
