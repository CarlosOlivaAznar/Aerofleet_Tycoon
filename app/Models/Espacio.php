<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;

    protected $table = 'espacios';
    protected $fillable = [
        'aeropuerto_id',
        'user_id',
        'numeroDeEspacios',
    ];

    public function espaciosDisponibles()
    {
        return $this->numeroDeEspacios - $this->espaciosOcupados();
    }

    // Funcion que devuelve los espacios que estan asignados en una ruta de un usuario
    public function espaciosOcupados()
    {
        $espaciosDep = count(Ruta::where('espacio_departure_id', $this->id)->where('user_id', auth()->id())->get());
        $espaciosArr = count(Ruta::where('espacio_arrival_id', $this->id)->where('user_id', auth()->id())->get());
        return $espaciosDep + $espaciosArr;
    }

    // Funcion que devuelve los espacios que estan ocupados de un aeropuerto (totales)
    public function espaciosOcupadosTotales()
    {
        $espaciosOcupados = 0;
        $espacios = Espacio::where('aeropuerto_id', $this->aeropuerto->id)->get();
        
        foreach ($espacios as $espacio) {
            $espaciosOcupados += $espacio->numeroDeEspacios;
        }

        return $espaciosOcupados;
    }

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruta()
    {
        $this->hasMany(Espacio::class);
    }
}
