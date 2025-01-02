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
        return $this->hasOne(Sede::class);
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

    public function prestamo()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function getNumEspacios()
    {
        $numEspacios = 0;
        
        foreach ($this->espacio as $espacio) {
            $numEspacios += $espacio->numeroDeEspacios;
        }
        
        return $numEspacios;
    }

    public function patrimonio()
    {
        $patrimonio = $this->saldo;
        
        $patrimonio += $this->patrimonioFlota();

        $patrimonio += $this->patrimonioEspacios();

        $patrimonio += $this->patrimonioSede();

        $patrimonio -= $this->patrimonioLeasings();

        foreach ($this->prestamo as $prestamo) {
            $patrimonio -= ($prestamo->devolver());
        }

        return $patrimonio;
    }

    public function patrimonioFlota()
    {
        $valor = 0;

        foreach ($this->flota as $flota) {
            if(!$flota->leasing){
                $valor += $flota->avion->precio;
            }
        }

        return $valor;
    }

    public function patrimonioEspacios()
    {
        $valor = 0;

        foreach ($this->espacio as $espacio) {
            $valor += $espacio->numeroDeEspacios * $espacio->aeropuerto->precioEspacio();
        }

        return $valor;
    }

    public function patrimonioSede()
    {
        $valor = 0;

        if($this->sede){
            $valor += count($this->sede->hangar) * $this->sede->costeHangar();
        }

        return $valor;
    }

    public function patrimonioLeasings()
    {
        $valor = 0;

        foreach ($this->flota as $avion) {
            if($avion->leasing){
                $valor += $avion->avion->leasePPD() * 31;
            }
        }

        return $valor;
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
