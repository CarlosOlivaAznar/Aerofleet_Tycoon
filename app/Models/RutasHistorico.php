<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutasHistorico extends Model
{
    protected $table = 'rutasHistoricos';
    protected $fillable = [
        'ruta_id',
        'user_id',
        'beneficios',
        'fecha',
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
