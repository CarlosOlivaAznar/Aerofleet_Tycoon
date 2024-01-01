<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    protected $table = 'aviones';
    protected $fillable = [
        'modelo',
        'fabricante',
        'capacidad',
        'precio',
        'rango',
        'img',
    ];

    public function flota()
    {
        return $this->hasMany(Flota::class);
    }

    public function avionsh()
    {
        return $this->hasMany(Avionsh::class);
    }
}
