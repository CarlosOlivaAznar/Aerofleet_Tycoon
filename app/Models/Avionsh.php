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
        'companyia',
        'condicion',
    ];

    public function avion()
    {
        return $this->belongsTo(Avion::class);
    }

    public static function avionAleatiorio()
    {
        /* 
        Array con todos los modelos de avion de segunda mano
        Al comprar un avion de segunda mano, se elegira uno aleatorio de esta lista para introducir a la base de datos
        */
        $modelosSh = [
            [16, 'images/737_aea.png', 'Air Europa'],
            [16, 'images/737_ryanair.png', 'Ryanair'],
            [19, 'images/747_lufthansa.png', 'Lufthansa'],
            [21, 'images/777_ana.png', 'All Nippon Airways'],
            [21, 'images/777_jal.png', 'Japan Airlines'],
            [6, 'images/a220_airbaltic.png', 'airBaltic'],
            [6, 'images/a220_swiss.png', 'Swiss'],
            [7, 'images/a320_volotea.png', 'Volotea'],
            [7, 'images/a320_vueling.png', 'Vueling'],
            [1, 'images/a320wl_aeroflot.png', 'Aeroflot'],
            [1, 'images/a320wl_avianca.png', 'Avianca'],
            [1, 'images/a320wl_easyjet.png', 'EasyJet'],
            [2, 'images/a321_vueling.png', 'Vueling'],
            [11, 'images/a330_aca.png', 'Air Canada'],
            [11, 'images/a330_brussels.png', 'Brussels Airlines'],
            [13, 'images/a340_iberia.png', 'Iberia'],
            [13, 'images/a340_qatar.png', 'Qatar'],
            [14, 'images/a350_airCaribes.png', 'Air Caribes'],
            [15, 'images/a380_british.png', 'British Airways'],
            [15, 'images/a380_malaysia.png', 'Malaysia Airlines'],
        ];

        return $modelosSh[rand(0, count($modelosSh)-1)];
    }
}
