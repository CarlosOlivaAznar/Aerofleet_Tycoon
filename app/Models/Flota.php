<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flota extends Model
{
    use HasFactory;

    protected $table = 'flota';
    protected $fillable = [
        'user_id',
        'avion_id',
        'matricula',
        'fechaDeFabricacion',
        'condicion',
        'estado',
    ];

    public function avion()
    {
        return $this->belongsTo(Avion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruta()
    {
        return $this->hasMany(Ruta::class);
    }
}
