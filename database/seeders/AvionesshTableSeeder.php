<?php

namespace Database\Seeders;

use App\Models\Avionsh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvionesshTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Los aviones de segunda mano es una tabla general que ven todos los usuario para que compitan por comprar aviones
        // mas baratos, introducimos por defecto en la tabla una serie de aviones
        // Cuando un usuario compra un avion de segunda mano se introduce uno nuevo aleatoriamente
        // Este metodo se encuentra en FlotaController -> comprarSegundaMano y se obtiene el nuevo avion desde el modelo de Avionsh

        // Borra los existentes para que no se dupliquen al ejecutar el seeder
        Avionsh::truncate();

        /* ----------------------- */
        /* Aviones de segunda mano */
        /* ----------------------- */
        Avionsh::create([
            'avion_id' => 9,
            'fechaDeFabricacion' => '2010-09-15',
            'img' => 'images/sh/a320_volotea.png',
            'companyia' => 'Volotea',
            'condicion' => 40,
        ]);

        Avionsh::create([
            'avion_id' => 2,
            'fechaDeFabricacion' => '2005-01-8',
            'img' => 'images/sh/a321_vueling.png',
            'companyia' => 'Vueling',
            'condicion' => 55,
        ]);

        Avionsh::create([
            'avion_id' => 1,
            'fechaDeFabricacion' => '2009-07-21',
            'img' => 'images/sh/a320wl_aeroflot.png',
            'companyia' => 'Aeroflot',
            'condicion' => 33,
        ]);

        Avionsh::create([
            'avion_id' => 12,
            'fechaDeFabricacion' => '2011-12-02',
            'img' => 'images/sh/a330_aca.png',
            'companyia' => 'Air Canada',
            'condicion' => 60,
        ]);

        Avionsh::create([
            'avion_id' => 1,
            'fechaDeFabricacion' => '2008-09-12',
            'img' => 'images/sh/a320wl_avianca.png',
            'companyia' => 'Avianca',
            'condicion' => 63,
        ]);

        Avionsh::create([
            'avion_id' => 21,
            'fechaDeFabricacion' => '2002-02-23',
            'img' => 'images/sh/737_ryanair.png',
            'companyia' => 'Ryanair',
            'condicion' => 78,
        ]);

        Avionsh::create([
            'avion_id' => 1,
            'fechaDeFabricacion' => '2003-07-04',
            'img' => 'images/sh/a320wl_easyjet.png',
            'companyia' => 'easyJet',
            'condicion' => 67,
        ]);

        Avionsh::create([
            'avion_id' => 26,
            'fechaDeFabricacion' => '2004-04-24',
            'img' => 'images/sh/777_ana.png',
            'companyia' => 'All Nippon Airways',
            'condicion' => 41,
        ]);

    }
}
