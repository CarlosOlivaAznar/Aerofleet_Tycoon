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
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 41.666319,
            'longitud' => -1.041822,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
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
            'pasajerosEstimados' => 100,
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

        Aeropuerto::create([
            'icao' => 'LEGR',
            'pais' => 'EC',
            'nombre' => 'Granada Federico Garcia Lorca Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 37.189,
            'longitud' => -3.777,
            'demanda' => 0.5,
            'pasajerosEstimados' => 75,
        ]);

        Aeropuerto::create([
            'icao' => 'GEML',
            'pais' => 'EC',
            'nombre' => 'Melilla Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 35.278578,
            'longitud' => -2.956592,
            'demanda' => 0.5,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEPA',
            'pais' => 'EC',
            'nombre' => 'Palma de Mallorca Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1200,
            'latitud' => 39.55,
            'longitud' => 2.733,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'GCTS',
            'pais' => 'EC',
            'nombre' => 'Tenerife South Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 28.044,
            'longitud' => -16.573,
            'demanda' => 0.85,
            'pasajerosEstimados' => 1200,
        ]);

        Aeropuerto::create([
            'icao' => 'LEBZ',
            'pais' => 'EC',
            'nombre' => 'Badajoz Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 38.883,
            'longitud' => -6.817,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LESU',
            'pais' => 'EC',
            'nombre' => 'Andorra La Seu de Urgel Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.339,
            'longitud' => 1.409,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEAS',
            'pais' => 'EC',
            'nombre' => 'Asturias Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 700,
            'latitud' => 43.563459,
            'longitud' => -6.034055,
            'demanda' => 0.70,
            'pasajerosEstimados' => 80,
        ]);

        Aeropuerto::create([
            'icao' => 'LESA',
            'pais' => 'EC',
            'nombre' => 'Salamanca Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 40.952324,
            'longitud' => -5.501694,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEMG',
            'pais' => 'EC',
            'nombre' => 'Malaga Costa Del Sol Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1300,
            'latitud' => 36.680405,
            'longitud' =>  -4.495739,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'LEIB',
            'pais' => 'EC',
            'nombre' => 'Ibiza Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 38.874818,
            'longitud' => 1.372702,
            'demanda' => 0.80,
            'pasajerosEstimados' => 1200,
        ]);

        Aeropuerto::create([
            'icao' => 'LEVC',
            'pais' => 'EC',
            'nombre' => 'Valencia Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 39.491103,
            'longitud' => -0.479332,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'LERJ',
            'pais' => 'EC',
            'nombre' => 'Logrono Agoncillo Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.458143,
            'longitud' => -2.316876,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEBA',
            'pais' => 'EC',
            'nombre' => 'Cordoba Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 37.844331,
            'longitud' => -4.845454,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'GCLP',
            'pais' => 'EC',
            'nombre' => 'Gran Canaria Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 27.932108,
            'longitud' => -15.387878,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'LEVX',
            'pais' => 'EC',
            'nombre' => 'Vigo-Peinador Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 350,
            'latitud' => 42.225144,
            'longitud' => -8.630107,
            'demanda' => 0.55,
            'pasajerosEstimados' => 55,
        ]);

        Aeropuerto::create([
            'icao' => 'LESO',
            'pais' => 'EC',
            'nombre' => 'San Sebastian Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 300,
            'latitud' => 43.356294,
            'longitud' => -1.791582,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEJR',
            'pais' => 'EC',
            'nombre' => 'Jerez Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 36.746670,
            'longitud' => -6.061259,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEAB',
            'pais' => 'EC',
            'nombre' => 'Albacete Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 38.947492,
            'longitud' => -1.877959,
            'demanda' => 0.50,
            'pasajerosEstimados' => 250,
        ]);

        Aeropuerto::create([
            'icao' => 'LEAL',
            'pais' => 'EC',
            'nombre' => 'Alicante Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 38.284185,
            'longitud' => -0.560171,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'GCGM',
            'pais' => 'EC',
            'nombre' => 'La Gomera Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 28.030379,
            'longitud' => -17.211643,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEXJ',
            'pais' => 'EC',
            'nombre' => 'Santander Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 43.425284,
            'longitud' => -3.821970,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
        ]);

        Aeropuerto::create([
            'icao' => 'GCFV',
            'pais' => 'EC',
            'nombre' => 'Fuerteventura Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 28.450959,
            'longitud' => -13.865727,
            'demanda' => 0.82,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'GCXO',
            'pais' => 'EC',
            'nombre' => 'Tenerife North Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 28.485454,
            'longitud' => -16.346494,
            'demanda' => 0.90,
            'pasajerosEstimados' => 150,
        ]);

        Aeropuerto::create([
            'icao' => 'GCLA',
            'pais' => 'EC',
            'nombre' => 'La Palma Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 28.623426,
            'longitud' => -17.755014,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
        ]);

        Aeropuerto::create([
            'icao' => 'LEVT',
            'pais' => 'EC',
            'nombre' => 'Vitoria Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.879280,
            'longitud' => -2.731260,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
        ]);

        Aeropuerto::create([
            'icao' => 'LEPP',
            'pais' => 'EC',
            'nombre' => 'Pamplona Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.765854,
            'longitud' => -1.642445,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
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


        // Plantilla
        /*
        Aeropuerto::create([
            'icao' => '',
            'pais' => 'EC',
            'nombre' => '',
            'espaciosTotales' => ,
            'costeOperacional' => ,
            'latitud' => ,
            'longitud' => ,
            'demanda' => ,
            'pasajerosEstimados' => ,
        ]);
        */

    }
}
