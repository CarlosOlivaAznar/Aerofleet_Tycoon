<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bugreport extends Model
{
    use HasFactory;

    protected $table = 'bugreport';
    protected $fillable = [
        'user_id',
        'bug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
