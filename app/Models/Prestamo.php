<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $fillable = [
        'user_id',
        'prestamo',
        'interes',
        'fechaFin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
