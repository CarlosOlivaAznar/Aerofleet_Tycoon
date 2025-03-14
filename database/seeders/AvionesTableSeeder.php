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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 4,
            'primeraMano' => 0,
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
            'categoria' => 3,
            'primeraMano' => 1,
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
            'categoria' => 3,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'a321xlr',
            'fabricante' => 'Airbus',
            'precio' => 150000000,
            'rango' => 8704,
            'img' => 'images/new/airbus/a321xlr.png',
            'capacidad' => 230,
            'costePorKm' => 7.589,
            'tiempoPorKm' => 0.12,
            'categoria' => 3,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'a220-100',
            'fabricante' => 'Airbus',
            'precio' => 75700000,
            'rango' => 3500,
            'img' => 'images/new/airbus/a220-100.png',
            'capacidad' => 115,
            'costePorKm' => 4.974,
            'tiempoPorKm' => 0.129,
            'categoria' => 4,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'a220-200',
            'fabricante' => 'Airbus',
            'precio' => 85700000,
            'rango' => 4000,
            'img' => 'images/new/airbus/a220.png',
            'capacidad' => 135,
            'costePorKm' => 5.122,
            'tiempoPorKm' => 0.129,
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 4,
            'primeraMano' => 0,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 3,
            'primeraMano' => 0,
        ]);

        Avion::create([
            'modelo' => 'a330-800neo',
            'fabricante' => 'Airbus',
            'precio' => 259900000,
            'rango' => 13000,
            'img' => 'images/new/airbus/a330-800neo.png',
            'capacidad' => 300,
            'costePorKm' => 13.192,
            'tiempoPorKm' => 0.11,
            'categoria' => 3,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'a330-900neo',
            'fabricante' => 'Airbus',
            'precio' => 296400000,
            'rango' => 11000,
            'img' => 'images/new/airbus/a330-900neo.png',
            'capacidad' => 440,
            'costePorKm' => 13.761,
            'tiempoPorKm' => 0.11,
            'categoria' => 3,
            'primeraMano' => 1,
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
            'categoria' => 2,
            'primeraMano' => 0,
        ]);

        Avion::create([
            'modelo' => 'a340-500',
            'fabricante' => 'Airbus',
            'precio' => 295000000,
            'rango' => 14500,
            'img' => 'images/new/airbus/a340-500.png',
            'capacidad' => 380,
            'costePorKm' => 25.3394,
            'tiempoPorKm' => 0.108,
            'categoria' => 2,
            'primeraMano' => 0,
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
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'a350-900',
            'fabricante' => 'Airbus',
            'precio' => 340000000,
            'rango' => 15185,
            'img' => 'images/new/airbus/a350.png',
            'capacidad' => 440,
            'costePorKm' => 14.774,
            'tiempoPorKm' => 0.108,
            'categoria' => 2,
            'primeraMano' => 1,
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
            'categoria' => 1,
            'primeraMano' => 0,
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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 3,
            'primeraMano' => 0,
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
            'categoria' => 1,
            'primeraMano' => 0,
        ]);

        Avion::create([
            'modelo' => '747-800',
            'fabricante' => 'Boeing',
            'precio' => 418000000,
            'rango' => 12350,
            'img' => 'images/new/boeing/747-800.png',
            'capacidad' => 700,
            'costePorKm' => 34.9478,
            'tiempoPorKm' => 0.105,
            'categoria' => 1,
            'primeraMano' => 0,
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
            'categoria' => 2,
            'primeraMano' => 1,
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
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => '777-8X',
            'fabricante' => 'Boeing',
            'precio' => 385000000,
            'rango' => 15000,
            'img' => 'images/new/boeing/777-200.png',
            'capacidad' => 450,
            'costePorKm' => 15.7534,
            'tiempoPorKm' => 0.101,
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => '777-9X',
            'fabricante' => 'Boeing',
            'precio' => 400000000,
            'rango' => 12500,
            'img' => 'images/new/boeing/777-300er.png',
            'capacidad' => 500,
            'costePorKm' => 16.1454,
            'tiempoPorKm' => 0.101,
            'categoria' => 2,
            'primeraMano' => 1,
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
            'categoria' => 2,
            'primeraMano' => 1,
        ]);


        /* --------------- */
        /* AVIONES Embraer */
        /* --------------- */

        Avion::create([
            'modelo' => 'e145',
            'fabricante' => 'Embraer',
            'precio' => 16000000,
            'rango' => 2250,
            'img' => 'images/new/embraer/e145.png',
            'capacidad' => 50,
            'costePorKm' => 5.950,
            'tiempoPorKm' => 0.155,
            'categoria' => 4,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => 'e170',
            'fabricante' => 'Embraer',
            'precio' => 25000000,
            'rango' => 2500,
            'img' => 'images/new/embraer/e170.png',
            'capacidad' => 72,
            'costePorKm' => 6.085,
            'tiempoPorKm' => 0.147,
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
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
            'categoria' => 4,
            'primeraMano' => 1,
        ]);


        /* ------------- */
        /* Boeing 737MAX */
        /* ------------- */
        Avion::create([
            'modelo' => '737-8MAX',
            'fabricante' => 'Boeing',
            'precio' => 121600000,
            'rango' => 4750,
            'img' => 'images/new/boeing/b738MAX.png',
            'capacidad' => '210',
            'costePorKm' => 6.806,
            'tiempoPorKm' => 0.119,
            'categoria' => 3,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => '737-9MAX',
            'fabricante' => 'Boeing',
            'precio' => 128900000,
            'rango' => 5780,
            'img' => 'images/new/boeing/b739MAX.png',
            'capacidad' => 220,
            'costePorKm' => 7.164,
            'tiempoPorKm' => 0.119,
            'categoria' => 3,
            'primeraMano' => 1,
        ]);

        /* ---------------- */
        /* Airbus a350-1000 */
        /* ---------------- */
        Avion::create([
            'modelo' => 'a350-1000',
            'fabricante' => 'Airbus',
            'precio' => 355700000,
            'rango' => 14500,
            'img' => 'images/new/airbus/a350-1000.png',
            'capacidad' => 480,
            'costePorKm' => 14.774,
            'tiempoPorKm' => 0.108,
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        
        /* ---------------- */
        /* Boeing 757 y 767 */
        /* ---------------- */

        Avion::create([
            'modelo' => '757-200',
            'fabricante' => 'Boeing',
            'precio' => 140000000,
            'rango' => 6250,
            'img' => 'images/new/boeing/757-200.png',
            'capacidad' => 239,
            'costePorKm' => 9.734,
            'tiempoPorKm' => 0.114,
            'categoria' => 3,
            'primeraMano' => 0,
        ]);

        Avion::create([
            'modelo' => '757-300',
            'fabricante' => 'Boeing',
            'precio' => 150000000,
            'rango' => 6421,
            'img' => 'images/new/boeing/757-300.png',
            'capacidad' => 290,
            'costePorKm' => 10.649,
            'tiempoPorKm' => 0.114,
            'categoria' => 3,
            'primeraMano' => 0,
        ]);

        Avion::create([
            'modelo' => '767-200',
            'fabricante' => 'Boeing',
            'precio' => 217000000,
            'rango' => 9400,
            'img' => 'images/new/boeing/767-200.png',
            'capacidad' => 260,
            'costePorKm' => 12.683,
            'tiempoPorKm' => 0.114,
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => '767-300',
            'fabricante' => 'Boeing',
            'precio' => 235000000,
            'rango' => 9650,
            'img' => 'images/new/boeing/767-300.png',
            'capacidad' => 290,
            'costePorKm' => 12.857,
            'tiempoPorKm' => 0.114,
            'categoria' => 2,
            'primeraMano' => 1,
        ]);

        Avion::create([
            'modelo' => '767-400',
            'fabricante' => 'Boeing',
            'precio' => 256000000,
            'rango' => 9940,
            'img' => 'images/new/boeing/767-400.png',
            'capacidad' => 310,
            'costePorKm' => 13.173,
            'tiempoPorKm' => 0.114,
            'categoria' => 2,
            'primeraMano' => 1,
        ]);


        /* Plantilla
        Avion::create([
            'modelo' => '',
            'fabricante' => 'Boeing',
            'precio' => ,
            'rango' => ,
            'img' => 'images/new/bombardier/',
            'capacidad' => ,
            'costePorKm' => ,
            'tiempoPorKm' => ,
            'categoria' => ,
        ]);
        */
        

    }
}
