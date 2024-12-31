<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $fillable = [
        'user_id',
        'prestamo',
        'devuelto',
        'interes',
        'fechaFin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuotaPorDia()
    {
        $intereses = ($this->prestamo * $this->interes) / 360;
        
        $fechaFin = Carbon::create($this->fechaFin);
        $fechaInicio = Carbon::create($this->created_at);
        
        $cuota = $this->prestamo / $fechaFin->diffInDays($fechaInicio);

        return $cuota + $intereses;
    }
}
