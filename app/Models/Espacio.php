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

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
