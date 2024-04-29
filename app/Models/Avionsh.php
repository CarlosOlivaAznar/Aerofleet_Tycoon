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
            [16, 'images/sh/737_aea.png', 'Air Europa'],
            [16, 'images/sh/737_ryanair.png', 'Ryanair'],
            [19, 'images/sh/747_lufthansa.png', 'Lufthansa'],
            [21, 'images/sh/777_ana.png', 'All Nippon Airways'],
            [21, 'images/sh/777_jal.png', 'Japan Airlines'],
            [6, 'images/sh/a220_airbaltic.png', 'airBaltic'],
            [6, 'images/sh/a220_swiss.png', 'Swiss'],
            [7, 'images/sh/a320_volotea.png', 'Volotea'],
            [7, 'images/sh/a320_vueling.png', 'Vueling'],
            [1, 'images/sh/a320wl_aeroflot.png', 'Aeroflot'],
            [1, 'images/sh/a320wl_avianca.png', 'Avianca'],
            [1, 'images/sh/a320wl_easyjet.png', 'EasyJet'],
            [2, 'images/sh/a321_vueling.png', 'Vueling'],
            [11, 'images/sh/a330_aca.png', 'Air Canada'],
            [11, 'images/sh/a330_brussels.png', 'Brussels Airlines'],
            [13, 'images/sh/a340_iberia.png', 'Iberia'],
            [13, 'images/sh/a340_qatar.png', 'Qatar'],
            [14, 'images/sh/a350_airCaribes.png', 'Air Caribes'],
            [15, 'images/sh/a380_british.png', 'British Airways'],
            [15, 'images/sh/a380_malaysia.png', 'Malaysia Airlines'],
            [4, 'images/sh/a320neo_india.png', 'Air India'],
            [4, 'images/sh/a320neo_ana.png', 'All Nippon Airways'],
            [4, 'images/sh/a320neo_malta.png', 'Air Malta'],
            [4, 'images/sh/a320neo_avianca.png', 'Avianca'],
            [4, 'images/sh/a320neo_eurowings.png', 'Eurowings'],
            [4, 'images/sh/a320neo_spirit.png', 'Spirit'],
            [14, 'images/sh/a350_cathay.png', 'Cathay Pacific'],
            [14, 'images/sh/a350_qatar.png', 'Qatar Airways'],
            [14, 'images/sh/a350_sas.png', 'Scandinavian Airlines'],
            [14, 'images/sh/a350_thai.png', 'Thai Airways International'],
            [23, 'images/sh/e170_hop.png', 'Air France Hop'],
            [23, 'images/sh/e170_alitalia.png', 'Alitalia Express'],
            [24, 'images/sh/e175_alaska.png', 'Alaska Airlines'],
            [24, 'images/sh/e175_aeromexico.png', 'AeroMexico Connect'],
            [25, 'images/sh/e190_aircanada.png', 'Air Canada'],
            [25, 'images/sh/e190_ba.png', 'BA CityFlyer'],
            [25, 'images/sh/e190_finnair.png', 'Finnair'],
            [26, 'images/sh/e195_flybe.png', 'FlyBe'],
            [26, 'images/sh/e195_binter.png', 'Binter'],
            [26, 'images/sh/e195_azul.png', 'Azul Linhas Aéreas'],
            [27, 'images/sh/crj200_delta.png', 'Delta ExpressJet'],	
            [27, 'images/sh/crj200_sa.png', 'SA Express Airways'],
            [28, 'images/sh/crj700_airfrance.png', 'Air France HOP'],
            [28, 'images/sh/crj700_united.png', 'United Express'],
            [29, 'images/sh/crj900_sas.png', 'Scandinavian Airlines'],
            [29, 'images/sh/crj900_american.png', 'American Eagle'],
            [29, 'images/sh/crj900_aircanada.png', 'Air Canada Express'],
            [30, 'images/sh/crj1000_airnostrum.png', 'Iberia Regional Air Nostrum'],
            [30, 'images/sh/crj1000_binter.png', 'Binter'],
            [30, 'images/sh/crj1000_hop.png', 'Air France HOP'],
        ];

        // Plantilla avion nuevo
        // [30, 'images/sh/', ''],		          
        
        return $modelosSh[rand(0, count($modelosSh)-1)];
    }
}
