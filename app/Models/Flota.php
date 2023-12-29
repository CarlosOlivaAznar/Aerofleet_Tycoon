<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flota extends Model
{
    use HasFactory;

    protected $table = 'flota';
    protected $fillable = [
        'uid',
        'id_avion',
        'matricula',
        'modelo',
        'fechaDeFabricacion',
        'estado',
        'status',
        'precio',
        'rango',
        'img',
    ];
}
