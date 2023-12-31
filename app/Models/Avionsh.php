<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avionsh extends Model
{
    use HasFactory;

    protected $table = 'avionessh';
    protected $fillable = [
        'avion_id',
        'fechaDeFabricacion',
        'img',
        'compañia',
        'condicion',
    ];

    public function avion()
    {
        return $this->belongsTo(Avion::class);
    }
}
