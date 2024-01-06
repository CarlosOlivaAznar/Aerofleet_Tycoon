<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $table = 'aeropuertos';

    public function espacio()
    {
        return $this->hasMany(Espacio::class);
    }

    public function sede()
    {
        return $this->hasMany(Sede::class);
    }
}
