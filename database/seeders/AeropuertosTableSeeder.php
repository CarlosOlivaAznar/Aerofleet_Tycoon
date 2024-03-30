<?php

namespace Database\Seeders;

use App\Models\Aeropuerto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AeropuertosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* ------------------ */
        /* Aeropuertos España */
        /* ------------------ */
        Aeropuerto::create([
            'icao' => 'LEZG',
            'pais' => 'EC',
            'nombre' => 'Aeropuerto de Zaragoza',
            'espaciosTotales' => 30,
            'costeOperacional' => 500,
            'latitud' => 41.666319,
            'longitud' => -1.041822,
            'demanda' => 0.70,
            'pasajerosEstimados' => 65,
        ]);

        Aeropuerto::create([
            'icao' => 'LEMD',
            'pais' => 'EC',
            'nombre' => 'Aeropuerto Adolfo Suárez Madrid-Barajas',
            'espaciosTotales' => 450,
            'costeOperacional' => 2000,
            'latitud' => 40.489243,
            'longitud' => -3.565694,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
        ]);

        Aeropuerto::create([
            'icao' => 'LEBL',
            'pais' => 'EC',
            'nombre' => 'Aeropuerto Josep Tarradellas Barcelona-El Prat',
            'espaciosTotales' => 400,
            'costeOperacional' => 1500,
            'latitud' => 41.293202,
            'longitud' => 2.083427,
            'demanda' => 0.95,
            'pasajerosEstimados' => 300,
        ]);

        Aeropuerto::create([
            'icao' => 'LEZL',
            'pais' => 'EC',
            'nombre' => 'Aeropuerto de Sevilla',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 37.42003,
            'longitud' => -5.896948,
            'demanda' => 0.75,
            'pasajerosEstimados' => 65,
        ]);

        Aeropuerto::create([
            'icao' => 'LEBB',
            'pais' => 'EC',
            'nombre' => 'Aeropuerto de Bilbao',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 43.302480,
            'longitud' => -2.910221,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        /* -------------- */
        /* Aeropuertos UK */
        /* -------------- */
        Aeropuerto::create([
            'icao' => 'EGPH',
            'pais' => 'G',
            'nombre' => 'Edinburgh Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1350,
            'latitud' => 55.949532,
            'longitud' => -3.361085,
            'demanda' => 0.88,
            'pasajerosEstimados' => 150,
        ]);

    }
}
