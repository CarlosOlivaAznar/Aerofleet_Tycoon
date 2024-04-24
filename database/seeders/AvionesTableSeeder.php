<?php

namespace Database\Seeders;

use App\Models\Avion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borra los existentes para que no se dupliquen al ejecutar el seeder
        Avion::truncate();

        /* -------------- */
        /* AVIONES AIRBUS */
        /* -------------- */
        Avion::create([
            'modelo' => 'a320WL',
            'fabricante' => 'Airbus',
            'precio' => 101000000,
            'rango' => 3500,
            'img' => 'images/new/airbus/a320WL.png',
            'capacidad' => 180,
            'costePorKm' => 7.289,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a321',
            'fabricante' => 'Airbus',
            'precio' => 118000000,
            'rango' => 4500,
            'img' => 'images/new/airbus/a321.png',
            'capacidad' => 220,
            'costePorKm' => 9.1605,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a319',
            'fabricante' => 'Airbus',
            'precio' => 92300000,
            'rango' => 2500,
            'img' => 'images/new/airbus/a319.png',
            'capacidad' => 150,
            'costePorKm' => 6.107,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a320neo',
            'fabricante' => 'Airbus',
            'precio' => 110600000,
            'rango' => 4500,
            'img' => 'images/new/airbus/a320neo.png',
            'capacidad' => 190,
            'costePorKm' => 6.501,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a321neo',
            'fabricante' => 'Airbus',
            'precio' => 129500000,
            'rango' => 6000,
            'img' => 'images/new/airbus/a321neo.png',
            'capacidad' => 230,
            'costePorKm' => 7.289,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a220',
            'fabricante' => 'Airbus',
            'precio' => 85700000,
            'rango' => 4000,
            'img' => 'images/new/airbus/a220.png',
            'capacidad' => 135,
            'costePorKm' => 5.122,
            'tiempoPorKm' => 0.129,
        ]);

        Avion::create([
            'modelo' => 'a320',
            'fabricante' => 'Airbus',
            'precio' => 99000000,
            'rango' => 3250,
            'img' => 'images/new/airbus/a320.png',
            'capacidad' => 180,
            'costePorKm' => 7.88,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a318',
            'fabricante' => 'Airbus',
            'precio' => 77000000,
            'rango' => 2250,
            'img' => 'images/new/airbus/a318.png',
            'capacidad' => 132,
            'costePorKm' => 5.2599,
            'tiempoPorKm' => 0.134,
        ]);

        Avion::create([
            'modelo' => 'a319neo',
            'fabricante' => 'Airbus',
            'precio' => 101000000,
            'rango' => 3500,
            'img' => 'images/new/airbus/a319neo.png',
            'capacidad' => 160,
            'costePorKm' => 5.91,
            'tiempoPorKm' => 0.12,
        ]);

        Avion::create([
            'modelo' => 'a330-200',
            'fabricante' => 'Airbus',
            'precio' => 245000000,
            'rango' => 9500,
            'img' => 'images/new/airbus/a330-200.png',
            'capacidad' => 290,
            'costePorKm' => 14.5386,
            'tiempoPorKm' => 0.115,
        ]);

        Avion::create([
            'modelo' => 'a330-300',
            'fabricante' => 'Airbus',
            'precio' => 270000000,
            'rango' => 9000,
            'img' => 'images/new/airbus/a330-300.png',
            'capacidad' => 440,
            'costePorKm' => 17.73,
            'tiempoPorKm' => 0.115,
        ]);

        Avion::create([
            'modelo' => 'a340-300',
            'fabricante' => 'Airbus',
            'precio' => 280000000,
            'rango' => 10500,
            'img' => 'images/new/airbus/a340-300.png',
            'capacidad' => 320,
            'costePorKm' => 20.3394,
            'tiempoPorKm' => 0.108,
        ]);

        Avion::create([
            'modelo' => 'a340-600',
            'fabricante' => 'Airbus',
            'precio' => 309000000,
            'rango' => 10000,
            'img' => 'images/new/airbus/a340-600.png',
            'capacidad' => 440,
            'costePorKm' => 26.201,
            'tiempoPorKm' => 0.108,
        ]);

        Avion::create([
            'modelo' => 'a350',
            'fabricante' => 'Airbus',
            'precio' => 340000000,
            'rango' => 15185,
            'img' => 'images/new/airbus/a350.png',
            'capacidad' => 440,
            'costePorKm' => 14.774,
            'tiempoPorKm' => 0.108,
        ]);

        Avion::create([
            'modelo' => 'a380',
            'fabricante' => 'Airbus',
            'precio' => 471200000,
            'rango' => 15185,
            'img' => 'images/new/airbus/a380.png',
            'capacidad' => 800,
            'costePorKm' => 38.4544,
            'tiempoPorKm' => 0.108,
        ]);


        /* -------------- */
        /* AVIONES BOEING */
        /* -------------- */

        Avion::create([
            'modelo' => '737-800',
            'fabricante' => 'Boeing',
            'precio' => 90000000,
            'rango' => 3450,
            'img' => 'images/new/boeing/737-800.png',
            'capacidad' => 162,
            'costePorKm' => 7.6436,
            'tiempoPorKm' => 0.119,
        ]);

        Avion::create([
            'modelo' => '737-900',
            'fabricante' => 'Boeing',
            'precio' => 107000000,
            'rango' => 4500,
            'img' => 'images/new/boeing/737-900.png',
            'capacidad' => 189,
            'costePorKm' => 8.7665,
            'tiempoPorKm' => 0.119,
        ]);

        Avion::create([
            'modelo' => '747-400',
            'fabricante' => 'Boeing',
            'precio' => 234000000,
            'rango' => 13450,
            'img' => 'images/new/boeing/747-400.png',
            'capacidad' => 660,
            'costePorKm' => 36.8784,
            'tiempoPorKm' => 0.105,
        ]);

        Avion::create([
            'modelo' => '747-800',
            'fabricante' => 'Boeing',
            'precio' => 418000000,
            'rango' => 12350,
            'img' => 'images/new/boeing/747-800.png',
            'capacidad' => 800,
            'costePorKm' => 34.9478,
            'tiempoPorKm' => 0.105,
        ]);

        Avion::create([
            'modelo' => '777-200',
            'fabricante' => 'Boeing',
            'precio' => 277000000,
            'rango' => 11850,
            'img' => 'images/new/boeing/777-200.png',
            'capacidad' => 440,
            'costePorKm' => 18.7347,
            'tiempoPorKm' => 0.108,
        ]);

        Avion::create([
            'modelo' => '777-300er',
            'fabricante' => 'Boeing',
            'precio' => 375000000,
            'rango' => 13650,
            'img' => 'images/new/boeing/777-300er.png',
            'capacidad' => 660,
            'costePorKm' => 23.4036,
            'tiempoPorKm' => 0.108,
        ]);

        Avion::create([
            'modelo' => '787',
            'fabricante' => 'Boeing',
            'precio' => 350000000,
            'rango' => 9530,
            'img' => 'images/new/boeing/787.png',
            'capacidad' => 400,
            'costePorKm' => 14.2825,
            'tiempoPorKm' => 0.108,
        ]);


        /* --------------- */
        /* AVIONES Embraer */
        /* --------------- */

        Avion::create([
            'modelo' => 'e170',
            'fabricante' => 'Embraer',
            'precio' => 25000000,
            'rango' => 2500,
            'img' => 'images/new/embraer/e170.png',
            'capacidad' => 72,
            'costePorKm' => 6.085,
            'tiempoPorKm' => 0.147,
        ]);

        Avion::create([
            'modelo' => 'e175',
            'fabricante' => 'Embraer',
            'precio' => 30000000,
            'rango' => 2750,
            'img' => 'images/new/embraer/e175.png',
            'capacidad' => 88,
            'costePorKm' => 6.1,
            'tiempoPorKm' => 0.147,
        ]);

        Avion::create([
            'modelo' => 'e190',
            'fabricante' => 'Embraer',
            'precio' => 40000000,
            'rango' => 4000,
            'img' => 'images/new/embraer/e190.png',
            'capacidad' => 114,
            'costePorKm' => 6.107,
            'tiempoPorKm' => 0.147,
        ]);

        Avion::create([
            'modelo' => 'e195',
            'fabricante' => 'Embraer',
            'precio' => 45000000,
            'rango' => 3500,
            'img' => 'images/new/embraer/e195.png',
            'capacidad' => 124,
            'costePorKm' => 6.110,
            'tiempoPorKm' => 0.147,
        ]);


        /* ----------------- */
        /* AVIONES Bomardier */
        /* ----------------- */
        Avion::create([
            'modelo' => 'CRJ200',
            'fabricante' => 'Bombardier',
            'precio' => 20000000,
            'rango' => 3045,
            'img' => 'images/new/bombardier/crj200.png',
            'capacidad' => 50,
            'costePorKm' => 5.75,
            'tiempoPorKm' => 0.15,
        ]);

        Avion::create([
            'modelo' => 'CRJ700',
            'fabricante' => 'Bombardier',
            'precio' => 30000000,
            'rango' => 3591,
            'img' => 'images/new/bombardier/crj700.png',
            'capacidad' => 75,
            'costePorKm' => 5.80,
            'tiempoPorKm' => 0.15,
        ]);

        Avion::create([
            'modelo' => 'CRJ900',
            'fabricante' => 'Bombardier',
            'precio' => 40000000,
            'rango' => 2956,
            'img' => 'images/new/bombardier/crj900.png',
            'capacidad' => 86,
            'costePorKm' => 5.90,
            'tiempoPorKm' => 0.15,
        ]);

        Avion::create([
            'modelo' => 'CRJ1000',
            'fabricante' => 'Bombardier',
            'precio' => 50000000,
            'rango' => 2761,
            'img' => 'images/new/bombardier/crj1000.png',
            'capacidad' => 104,
            'costePorKm' => 5.95,
            'tiempoPorKm' => 0.15,
        ]);



        /* Plantilla
        Avion::create([
            'modelo' => '',
            'fabricante' => 'Bombardier',
            'precio' => ,
            'rango' => ,
            'img' => 'images/new/bombardier/',
            'capacidad' => ,
            'costePorKm' => ,
            'tiempoPorKm' => ,
        ]);
        */
        

    }
}
