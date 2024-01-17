<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiosHistorico extends Model
{
    use HasFactory;

    protected $table = 'beneficiosHistoricos';
    protected $fillable = [
        'user_id',
        'beneficios',
        'saldo',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
