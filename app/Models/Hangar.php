<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hangar extends Model
{
    use HasFactory;

    protected $table = 'hangares';
    protected $fillable = [
        'sede_id',
        'espacios',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }
}
