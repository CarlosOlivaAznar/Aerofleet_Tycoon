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
        'user_id',
        'espacio_departure_id',
        'espacio_arrival_id',
        'horaInicio',
        'horaFin',
        'distancia',
        'tiempoEstimado',
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
}
