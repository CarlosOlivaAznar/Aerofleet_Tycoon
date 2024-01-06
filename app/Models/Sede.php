<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';
    protected $fillable = [
        'user_id',
        'aeropuerto_id',
        'hangar_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function hangar()
    {
        return $this->hasMany(Hangar::class);
    }
}
