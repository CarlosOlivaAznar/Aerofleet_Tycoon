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
            [21, 'images/sh/737_aea.png', 'Air Europa'],
            [21, 'images/sh/737_ryanair.png', 'Ryanair'],
            [24, 'images/sh/747_lufthansa.png', 'Lufthansa'],
            [26, 'images/sh/777_ana.png', 'All Nippon Airways'],
            [26, 'images/sh/777_jal.png', 'Japan Airlines'],
            [8, 'images/sh/a220_airbaltic.png', 'airBaltic'],
            [8, 'images/sh/a220_swiss.png', 'Swiss'],
            [9, 'images/sh/a320_volotea.png', 'Volotea'],
            [9, 'images/sh/a320_vueling.png', 'Vueling'],
            [1, 'images/sh/a320wl_aeroflot.png', 'Aeroflot'],
            [1, 'images/sh/a320wl_avianca.png', 'Avianca'],
            [1, 'images/sh/a320wl_easyjet.png', 'EasyJet'],
            [2, 'images/sh/a321_vueling.png', 'Vueling'],
            [12, 'images/sh/a330_aca.png', 'Air Canada'],
            [12, 'images/sh/a330_brussels.png', 'Brussels Airlines'],
            [18, 'images/sh/a340_iberia.png', 'Iberia'],
            [18, 'images/sh/a340_qatar.png', 'Qatar'],
            [19, 'images/sh/a350_airCaribes.png', 'Air Caribes'],
            [20, 'images/sh/a380_british.png', 'British Airways'],
            [20, 'images/sh/a380_malaysia.png', 'Malaysia Airlines'],
            [4, 'images/sh/a320neo_india.png', 'Air India'],
            [4, 'images/sh/a320neo_ana.png', 'All Nippon Airways'],
            [4, 'images/sh/a320neo_malta.png', 'Air Malta'],
            [4, 'images/sh/a320neo_avianca.png', 'Avianca'],
            [4, 'images/sh/a320neo_eurowings.png', 'Eurowings'],
            [4, 'images/sh/a320neo_spirit.png', 'Spirit'],
            [19, 'images/sh/a350_cathay.png', 'Cathay Pacific'],
            [19, 'images/sh/a350_qatar.png', 'Qatar Airways'],
            [19, 'images/sh/a350_sas.png', 'Scandinavian Airlines'],
            [19, 'images/sh/a350_thai.png', 'Thai Airways International'],
            [31, 'images/sh/e170_hop.png', 'Air France Hop'],
            [31, 'images/sh/e170_alitalia.png', 'Alitalia Express'],
            [32, 'images/sh/e175_alaska.png', 'Alaska Airlines'],
            [32, 'images/sh/e175_aeromexico.png', 'AeroMexico Connect'],
            [33, 'images/sh/e190_aircanada.png', 'Air Canada'],
            [33, 'images/sh/e190_ba.png', 'BA CityFlyer'],
            [33, 'images/sh/e190_finnair.png', 'Finnair'],
            [34, 'images/sh/e195_flybe.png', 'FlyBe'],
            [34, 'images/sh/e195_binter.png', 'Binter'],
            [34, 'images/sh/e195_azul.png', 'Azul Linhas Aéreas'],
            [35, 'images/sh/crj200_delta.png', 'Delta ExpressJet'],	
            [35, 'images/sh/crj200_sa.png', 'SA Express Airways'],
            [36, 'images/sh/crj700_airfrance.png', 'Air France HOP'],
            [36, 'images/sh/crj700_united.png', 'United Express'],
            [37, 'images/sh/crj900_sas.png', 'Scandinavian Airlines'],
            [37, 'images/sh/crj900_american.png', 'American Eagle'],
            [37, 'images/sh/crj900_aircanada.png', 'Air Canada Express'],
            [38, 'images/sh/crj1000_airnostrum.png', 'Iberia Regional Air Nostrum'],
            [38, 'images/sh/crj1000_binter.png', 'Binter'],
            [38, 'images/sh/crj1000_hop.png', 'Air France HOP'],
            [21, 'images/sh/b737_aeromexico.png', 'Aeromexico'],	
            [21, 'images/sh/b737_ana.png', 'All Nippon Airways'],	
            [21, 'images/sh/b737_airberlin.png', 'Air Berlin'],
            [22, 'images/sh/b739_continental.png', 'Continental Air Lines'],
            [22, 'images/sh/b739_korean.png', 'Korean Air'],
            [22, 'images/sh/b739_lion.png', 'Lion Air'],
            [5, 'images/sh/a321neo_american.png', 'American Airlines'],
            [5, 'images/sh/a321neo_airasia.png', 'Thai AirAsia'],
            [5, 'images/sh/a321neo_azul.png', 'Azul Linhas Aereas'],
            [14, 'images/sh/a338_kuwait.png', 'Kuwait Airways'],	
            [15, 'images/sh/a339_vatlantic.png', 'Virgin Atlantic'],
            [7, 'images/sh/a220-100_delta.png', 'Delta Airlines'],	
            [7, 'images/sh/a220-100_swiss.png', 'Swiss International Air Lines'],
            [17, 'images/sh/a345_thai.png', 'Thai Airways'],
            [17, 'images/sh/a345_singaporea.png', 'Singapore Airlines'],
            [30, 'images/sh/e145_bmi.png', 'British Midland'],		
            [30, 'images/sh/e145_united.png', 'United Express'],
            [39, 'images/sh/B738M_ethiopian.png', 'Ethiopian Airlines'],
            [39, 'images/sh/B738M_lionair.png', 'Lion Air'],
            [39, 'images/sh/B738M_alaska.png', 'Alaska Airlines'],
            [40, 'images/sh/B739M_aeromexico.png', 'Aeromexico'],
            [40, 'images/sh/B739M_alaska.png', 'Alaska Airlines'],
            [42, 'images/sh/b752_allegiant.png', 'Allegiant Air'],	
            [42, 'images/sh/b752_american.png', 'American Airlines'],	
            [42, 'images/sh/b752_icelandair.png', 'Icelandair'],
            [43, 'images/sh/b753_condor.png', 'Condor'],	
            [43, 'images/sh/b753_icelandair.png', 'Icelandair'],
            [45, 'images/sh/b763_asiana.png', 'Asiana Airlines'],	
            [45, 'images/sh/b763_ana.png', 'All Nippon Airways'],
            [46, 'images/sh/b764_delta.png', 'Delta Airlines'],
            [46, 'images/sh/b764_united.png', 'United Airlines'],
            
            
        ];

        // Plantilla avion nuevo
        // [46, 'images/sh/', ''],	
        
        return $modelosSh[rand(0, count($modelosSh)-1)];
    }
}
