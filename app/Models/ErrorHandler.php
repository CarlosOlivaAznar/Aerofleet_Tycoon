<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorHandler extends Model
{
    use HasFactory;

    protected $table = 'errorhandler';
    protected $fillable = [
        'message',
        'file',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
