<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    protected $table = 'aviones';
    protected $fillable = [
        'modelo',
        'fabricante',
        'capacidad',
        'precio',
        'rango',
        'img',
    ];

    public function flota()
    {
        return $this->hasMany(Flota::class);
    }

    public function avionsh()
    {
        return $this->hasMany(Avionsh::class);
    }

    public function categoria()
    {
        switch ($this->categoria) {
            case 1:
                return "Muy grande";
                break;
            case 2:
                return "Grande";
                break;
            case 3:
                return "Mediano";
                break;
            case 4:
                return "Pequeño";
                break;
            default:
                return "n/a";
                break;
        }
    }

    public function leasePPD()
    {
        return $this->precio * 0.0001084998;
    }

    /**
     * Las matriculas de los aviones varian de pais a pais
     * Cada uno tiene un prefijo propio, en España es EC- en
     * Reino Unido es G- en Alemania es D-.
     * El sufijo de las matriculas tambien varia algunos contienen 
     * 3 letras como en españa y en la mayoria de paises como 
     * por ejemplo "EC-MLD", pero en 
     * otros paises puede variar el sufijo y ser de 4 letras 
     * o contener numeros. Para mayor simpleza el prefijo 
     * sera el del pais y el sufijo se mantendra de 3 letras sin numeros
     */
    public function generarMatricula()
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        // Seleccionamos la matricula con mayor valor alfabeticamente
        $matriculaMax = Flota::where('matricula', 'LIKE', $sede->aeropuerto->pais.'%')->max('matricula');

        // si matriculaMax esta vacia quiere decir que es el primer avion que se compra de ese pais, devolvemos una matricula nueva con "AAA"
        if(strlen($matriculaMax) === 0){
            return $sede->aeropuerto->pais . "-AAA";
        }
        
        $sufijo = explode("-", $matriculaMax)[1];

        // Pasamos la cadena a un numero en base 26
        $sufijoNum = 0;
        for ($i=0; $i < strlen($sufijo); $i++) { 
            $sufijoNum *= 26;
            $sufijoNum += ord($sufijo[$i]) - ord('A') + 1;
        }

        // Sumamos un caracter a la cadena
        $sufijoNum++;

        // Hacemos el cambio pero al reves, pasamos de un numero en base 26 a una cadena de caracteres
        $resultado = "";
        while($sufijoNum > 0){
            $cambio = ($sufijoNum - 1) % 26;
            $resultado = chr($cambio + ord('A')) . $resultado;
            $sufijoNum = intval(($sufijoNum - $cambio) / 26);
        }
        
        return $sede->aeropuerto->pais . "-" . $resultado;
    }
}
