<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';
    protected $fillable = [
        'user_id',
        'aeropuerto_id',
        'hangar_id',
        'porcentajeVenta',
        'porcentajeComprado',
    ];

    public function costeIngenieros()
    {
        return $this->ingenieros * 30000;
    }

    public function costeHangar()
    {
        return $this->aeropuerto->costeOperacional * 580;
    }

    public function costeAmpliarHangar()
    {
        return $this->aeropuerto->costeOperacional * 85;
    }

    public function costesTotales()
    {
        return $this->costeIngenieros() + ($this->aeropuerto->costeAlquiler() * count($this->hangar));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function hangar()
    {
        return $this->hasMany(Hangar::class);
    }

    public function accion()
    {
        return $this->hasMany(Accion::class);
    }
}
