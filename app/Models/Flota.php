<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flota extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'matricula',
        'modelo',
        'fechaDeFabricacion',
        'estado',
        'status',
    ];
}
