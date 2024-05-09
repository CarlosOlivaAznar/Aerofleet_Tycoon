<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ultimaConexion',
        'tipoUsuario',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function flota()
    {
        return $this->hasMany(Flota::class);
    }

    public function espacio()
    {
        return $this->hasMany(Espacio::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function ruta()
    {
        return $this->hasMany(Ruta::class);
    }

    public function beneficiosHistorico()
    {
        return $this->hasMany(BeneficiosHistorico::class);
    }

    public function bugreport()
    {
        return $this->hasMany(Bugreport::class);
    }


    // Funcion estatica que hace una llamada a la base de datos para retornar el saldo en formato string del usuario que esta logeado
    // Se utiliza para mostrar en la parte superior derecha el saldo del usuario
    public static function getSaldoString()
    {
        $user = User::where('id', '=', auth()->id())
                    ->select('saldo')
                    ->first();
        
        $saldo = number_format($user->saldo, 0, ',', '.');
        
        return $saldo;
    }

    public static function getSaldo()
    {
        $user = User::where('id', '=', auth()->id())
                    ->select('saldo')
                    ->first();
        
        return $user;
    }
}
