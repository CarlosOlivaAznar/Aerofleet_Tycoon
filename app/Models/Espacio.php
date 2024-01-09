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

    public function espaciosOcupados()
    {
        $espaciosDep = count(Ruta::where('espacio_departure_id', $this->id)->get());
        $espaciosArr = count(Ruta::where('espacio_arrival_id', $this->id)->get());
        return $espaciosDep + $espaciosArr;
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
