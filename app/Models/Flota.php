<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flota extends Model
{
    use HasFactory;

    protected $table = 'flota';
    protected $fillable = [
        'user_id',
        'avion_id',
        'matricula',
        'fechaDeFabricacion',
        'condicion',
        'estado',
        'activacion',
        'leasing',
        'finLeasing',
    ];

    public function estatusS()
    {
        switch ($this->estado) {
            case 0:
                return trans('fleet.case0');
                break;
            case 1:
                return trans('fleet.case1');
                break;
            case 2:
                return trans('fleet.case2');
                break;
            case 3:
                return trans('fleet.case3');
                break;
            default:
                return trans('fleet.caseDef');
                break;
        }
    }

    public function estatusC()
    {
        switch ($this->estado) {
            case 0:
                return "error";
                break;
            case 1:
                return "exito";
                break;
            case 2:
                return "warning";
                break;
            case 3:
                return "primary";
                break;
            default:
                return "error";
                break;
        }
    }

    public function precioVenta()
    {
        return $this->avion->precio * (($this->condicion / 100) - 0.2);
    }

    public function avion()
    {
        return $this->belongsTo(Avion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ruta()
    {
        return $this->hasMany(Ruta::class);
    }
}
