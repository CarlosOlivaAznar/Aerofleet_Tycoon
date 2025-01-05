<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $table = 'acciones';
    protected $fillable = [
        'sede_id',
        'user_id',
        'accionesCompradas',
        'valorCompra',
        'beneficios',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function valorAccion()
    {
        return number_format((float)(($this->sede->user->patrimonio() * 100) / $this->valorCompra) - 100, 2, '.', '');
    }

    public function valorPrecio()
    {
        return $this->sede->user->patrimonio() * $this->accionesCompradas;
    }
}
