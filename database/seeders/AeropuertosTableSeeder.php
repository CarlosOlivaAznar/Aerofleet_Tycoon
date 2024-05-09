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
        // Borra los existentes para que no se dupliquen al ejecutar el seeder
        Aeropuerto::truncate();

        /* ------------------ */
        /* Aeropuertos España */
        /* ------------------ */
        /*
        MARK: España
        */
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
            'categoria' => 1,
            'isla' => false,
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
            'categoria' => 1,
            'isla' => false,
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
            'categoria' => 1,
            'isla' => false,
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
            'categoria' => 1,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'GEML',
            'pais' => 'EC',
            'nombre' => 'Melilla Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 35.278598,
            'longitud' => -2.956094,
            'demanda' => 0.5,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => true,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 4,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => true,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => true,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 4,
            'isla' => true,
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
            'categoria' => 3,
            'isla' => false,
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
            'categoria' => 2,
            'isla' => true,
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
            'categoria' => 1,
            'isla' => true,
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
            'categoria' => 3,
            'isla' => true,
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
            'categoria' => 2,
            'isla' => false,
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
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'Lanzarote Airport',
            'pais' => 'EC',
            'nombre' => 'GCRR',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 28.946323,
            'longitud' => -13.605856,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'LECO',
            'pais' => 'EC',
            'nombre' => 'A Coruna Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 43.301552,
            'longitud' => -8.378496,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEAM',
            'pais' => 'EC',
            'nombre' => 'Almeria Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 450,
            'latitud' => 36.844059,
            'longitud' => -2.372628,
            'demanda' => 0.65,
            'pasajerosEstimados' => 70,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEBG',
            'pais' => 'EC',
            'nombre' => 'Burgos Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.357375,
            'longitud' => -3.614885,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LECH',
            'pais' => 'EC',
            'nombre' => 'Castellon Costa Azahar Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 40.214232,
            'longitud' => 0.075458,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'GCHI',
            'pais' => 'EC',
            'nombre' => 'El Hierro Airport',
            'espaciosTotales' => 35,
            'costeOperacional' => 350,
            'latitud' => 27.814811,
            'longitud' => -17.887015,
            'demanda' => 0.55,
            'pasajerosEstimados' => 60,
            'categoria' => 4,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'LEGE',
            'pais' => 'EC',
            'nombre' => 'Girona Costa Brava Airport',
            'espaciosTotales' => 70,
            'costeOperacional' => 750,
            'latitud' => 41.905033,
            'longitud' => 2.763138,
            'demanda' => 0.75,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LELN',
            'pais' => 'EC',
            'nombre' => 'Leon Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.592833,
            'longitud' => -5.650300,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEDA',
            'pais' => 'EC',
            'nombre' => 'Lleida Alguaire Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 41.727873,
            'longitud' => 0.537245,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEMH',
            'pais' => 'EC',
            'nombre' => 'Mahon Menorca Airport',
            'espaciosTotales' => 150,
            'costeOperacional' => 1000,
            'latitud' => 39.863613,
            'longitud' => 4.221213,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LERS',
            'pais' => 'EC',
            'nombre' => 'Reus Airport',
            'espaciosTotales' => 65,
            'costeOperacional' => 700,
            'latitud' => 41.148163,
            'longitud' => 1.166753,
            'demanda' => 0.75,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEST',
            'pais' => 'EC',
            'nombre' => 'Santiago de Compostela Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 42.895924,
            'longitud' => -8.415771,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LEVD',
            'pais' => 'EC',
            'nombre' => 'Valladolid Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 41.708169,
            'longitud' => -4.846980,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        
        /* -------------- */
        /* Aeropuertos UK */
        /* -------------- */
        /*
        MARK: Reino Unido
        */
        Aeropuerto::create([
            'icao' => 'EGPH',
            'pais' => 'G',
            'nombre' => 'Edinburgh Airport',
            'espaciosTotales' => 300,
            'costeOperacional' => 1450,
            'latitud' => 55.949532,
            'longitud' => -3.361085,
            'demanda' => 0.88,
            'pasajerosEstimados' => 200,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGAC',
            'pais' => 'G',
            'nombre' => 'Belfast City George Best Airport',
            'espaciosTotales' => 175,
            'costeOperacional' => 850,
            'latitud' => 54.618309,
            'longitud' => -5.871240,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGBB',
            'pais' => 'G',
            'nombre' => 'Birmingham Airport',
            'espaciosTotales' => 175,
            'costeOperacional' => 850,
            'latitud' => 52.450955,
            'longitud' => -1.740724,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGHH',
            'pais' => 'G',
            'nombre' => 'Bournemouth Airport',
            'espaciosTotales' => 35,
            'costeOperacional' => 300,
            'latitud' => 50.780592,
            'longitud' => -1.839075,
            'demanda' => 0.55,
            'pasajerosEstimados' => 55,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGGD',
            'pais' => 'G',
            'nombre' => 'Bristol Airport',
            'espaciosTotales' => 233,
            'costeOperacional' => 1300,
            'latitud' => 51.382738,
            'longitud' => -2.716128,
            'demanda' => 0.85,
            'pasajerosEstimados' => 125,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGFF',
            'pais' => 'G',
            'nombre' => 'Cardiff Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 51.397386,
            'longitud' => -3.344323,
            'demanda' => 0.70,
            'pasajerosEstimados' => 500,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGAE',
            'pais' => 'G',
            'nombre' => 'City of Derry Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 400,
            'latitud' => 55.042143,
            'longitud' => -7.158315,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGCN',
            'pais' => 'G',
            'nombre' => 'Doncaster Sheffield Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 53.479287,
            'longitud' => -1.005454,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPN',
            'pais' => 'G',
            'nombre' => 'Dundee Airport',
            'espaciosTotales' => 30,
            'costeOperacional' => 300,
            'latitud' => 56.452726,
            'longitud' => -3.020384,
            'demanda' => 0.55,
            'pasajerosEstimados' => 55,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGNX',
            'pais' => 'G',
            'nombre' => 'Nottingham East Midlands',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 52.829908,
            'longitud' => -1.323593,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGTE',
            'pais' => 'G',
            'nombre' => 'Exeter Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 400,
            'latitud' => 50.733331,
            'longitud' => -3.413278,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPF',
            'pais' => 'G',
            'nombre' => 'Glasgow International Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 55.871651,
            'longitud' => -4.432540,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPK',
            'pais' => 'G',
            'nombre' => 'Glasgow Prestwick Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 55.509128,
            'longitud' => -4.594116,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 2,
            'isla' => false,
        ]);

        /*
        Aeropuerto::create([
            'icao' => 'EGNJ',
            'pais' => 'G',
            'nombre' => 'Humberside Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 0.50,
            'longitud' => 53.579762,
            'demanda' => -0.347168,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);*/

        Aeropuerto::create([
            'icao' => 'EGPE',
            'pais' => 'G',
            'nombre' => 'Inverness Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 57.541475,
            'longitud' => -4.053053,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPA',
            'pais' => 'G',
            'nombre' => 'Kirkwall Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 58.956598,
            'longitud' => -2.900229,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGNM',
            'pais' => 'G',
            'nombre' => 'Leeds Bradford Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 900,
            'latitud' => 53.868280,
            'longitud' => -1.661685,
            'demanda' => 0.75,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGGP',
            'pais' => 'G',
            'nombre' => 'Liverpool John Lennon Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 53.335016,
            'longitud' => -2.849416,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGLC',
            'pais' => 'G',
            'nombre' => 'London City Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 1200,
            'latitud' => 51.504976,
            'longitud' => 0.054435,
            'demanda' => 0.85,
            'pasajerosEstimados' => 1200,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGKK',
            'pais' => 'G',
            'nombre' => 'London Gatwick Airport',
            'espaciosTotales' => 350,
            'costeOperacional' => 1800,
            'latitud' => 51.153914,
            'longitud' => -0.178471,
            'demanda' => 0.95,
            'pasajerosEstimados' => 270,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGLL',
            'pais' => 'G',
            'nombre' => 'London Heathrow Airport',
            'espaciosTotales' => 450,
            'costeOperacional' => 2300,
            'latitud' => 51.471456,
            'longitud' => -0.457651,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGGW',
            'pais' => 'G',
            'nombre' => 'London Luton Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 51.876013,
            'longitud' => -0.369553,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGMC',
            'pais' => 'G',
            'nombre' => 'London Southend Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 51.571104,
            'longitud' => 0.697675,
            'demanda' => 0.50,
            'pasajerosEstimados' => 250,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGSS',
            'pais' => 'G',
            'nombre' => 'London Stansted Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1000,
            'latitud' => 51.887087,
            'longitud' => 0.243921,
            'demanda' => 0.80,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGCC',
            'pais' => 'G',
            'nombre' => 'Manchester Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 53.357479,
            'longitud' => -2.273305,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGSH',
            'pais' => 'G',
            'nombre' => 'Norwich International Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 52.675776,
            'longitud' => 1.283087,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGEO',
            'pais' => 'G',
            'nombre' => 'North Connel Oban Airport',
            'espaciosTotales' => 20,
            'costeOperacional' => 200,
            'latitud' => 56.465285,
            'longitud' => -5.398845,
            'demanda' => 0.40,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGHI',
            'pais' => 'G',
            'nombre' => 'Southampton Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 600,
            'latitud' => 50.950404,
            'longitud' => -1.358112,
            'demanda' => 0.70,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPO',
            'pais' => 'G',
            'nombre' => 'Stornoway Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 400,
            'latitud' => 58.215104,
            'longitud' => -6.326474,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPB',
            'pais' => 'G',
            'nombre' => 'Sumburgh Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 450,
            'latitud' => 59.876255,
            'longitud' => -1.290146,
            'demanda' => 0.65,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPC',
            'pais' => 'G',
            'nombre' => 'Wick Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 58.455393,
            'longitud' => -3.092044,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGPD',
            'pais' => 'G',
            'nombre' => 'Aberdeen International Airport',
            'espaciosTotales' => 150,
            'costeOperacional' => 1000,
            'latitud' => 57.203667,
            'longitud' => -2.199144,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGAA',
            'pais' => 'G',
            'nombre' => 'Belfast International Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 54.656496,
            'longitud' => -6.218708,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGNT',
            'pais' => 'G',
            'nombre' => 'Newcastle Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 55.036754,
            'longitud' => -1.694172,
            'demanda' => 0.80,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EGNV',
            'pais' => 'G',
            'nombre' => 'Teesside International Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 54.510217,
            'longitud' => -1.427492,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 2,
            'isla' => false,
        ]);



        /* --------- */
        /* Gibraltar */
        /* --------- */
        Aeropuerto::create([
            'icao' => 'LXGB',
            'pais' => 'EC',
            'nombre' => 'Gibraltar Airport',
            'espaciosTotales' => 30,
            'costeOperacional' => 350,
            'latitud' => 36.151248,
            'longitud' => -5.348205,
            'demanda' => 0.75,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);



        /* -------- */
        /* Guernsey */
        /* -------- */
        Aeropuerto::create([
            'icao' => 'EGJB',
            'pais' => 'G',
            'nombre' => 'Guernsey Airport',
            'espaciosTotales' => 65,
            'costeOperacional' => 600,
            'latitud' => 49.434157,
            'longitud' => -2.598232,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 4,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'EGJA',
            'pais' => 'G',
            'nombre' => 'Alderney Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 49.706722,
            'longitud' => -2.215208,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => true,
        ]);



        /* ----------- */
        /* Isla de Man */
        /* ----------- */
        Aeropuerto::create([
            'icao' => 'EGNS',
            'pais' => 'G',
            'nombre' => 'Isle of Man Airport',
            'espaciosTotales' => 65,
            'costeOperacional' => 750,
            'latitud' => 54.083217,
            'longitud' => -4.624370,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => true,
        ]);



        /* -------------- */
        /* Isla de Jersey */
        /* -------------- */
        Aeropuerto::create([
            'icao' => 'EGJJ',
            'pais' => 'G',
            'nombre' => 'Jersey Airport',
            'espaciosTotales' => 80,
            'costeOperacional' => 750,
            'latitud' => 49.207124,
            'longitud' => -2.195538,
            'demanda' => 0.70,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => true,
        ]);



        /* -------------------- */
        /* Aeropuertos Alemania */
        /* -------------------- */
        /*
        MARK: Alemania
        */

        Aeropuerto::create([
            'icao' => 'EDDB',
            'pais' => 'D',
            'nombre' => 'Berlin Brandenburg Airport',
            'espaciosTotales' => 450,
            'costeOperacional' => 2500,
            'latitud' => 52.362690,
            'longitud' => 13.500590,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDW',
            'pais' => 'D',
            'nombre' => 'Bremen Airport',
            'espaciosTotales' => 90,
            'costeOperacional' => 850,
            'latitud' => 53.048001,
            'longitud' => 8.787356,
            'demanda' => 0.80,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDK',
            'pais' => 'D',
            'nombre' => 'Cologne Bonn Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 50.868811,
            'longitud' => 7.140407,
            'demanda' => 0.85,
            'pasajerosEstimados' => 150,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDLW',
            'pais' => 'D',
            'nombre' => 'Dortmund Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 51.517080,
            'longitud' => 7.613403,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDC',
            'pais' => 'D',
            'nombre' => 'Dresden Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 600,
            'latitud' => 51.132256,
            'longitud' => 13.767650,
            'demanda' => 0.72,
            'pasajerosEstimados' => 80,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDL',
            'pais' => 'D',
            'nombre' => 'Dusseldorf International Airport',
            'espaciosTotales' => 350,
            'costeOperacional' => 1700,
            'latitud' => 51.286522,
            'longitud' => 6.766367,
            'demanda' => 0.85,
            'pasajerosEstimados' => 200,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDE',
            'pais' => 'D',
            'nombre' => 'Erfurt Weimar Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 50.978508,
            'longitud' => 10.960220,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDF',
            'pais' => 'D',
            'nombre' => 'Frankfurt Airport',
            'espaciosTotales' => 400,
            'costeOperacional' => 2000,
            'latitud' => 50.036697,
            'longitud' => 8.561932,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDFH',
            'pais' => 'D',
            'nombre' => 'Frankfurt Hahn Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 340,
            'latitud' => 49.945176,
            'longitud' => 7.263201,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDNY',
            'pais' => 'D',
            'nombre' => 'Friedrichshafen Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 47.670514,
            'longitud' => 9.512710,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDH',
            'pais' => 'D',
            'nombre' => 'Hamburg Airport',
            'espaciosTotales' => 300,
            'costeOperacional' => 1300,
            'latitud' => 53.633040,
            'longitud' => 9.993590,
            'demanda' => 0.87,
            'pasajerosEstimados' => 300,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDV',
            'pais' => 'D',
            'nombre' => 'Hannover Langenhagen Airport',
            'espaciosTotales' => 350,
            'costeOperacional' => 2300,
            'latitud' => 52.460813,
            'longitud' => 9.691958,
            'demanda' => 0.90,
            'pasajerosEstimados' => 250,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDSB',
            'pais' => 'D',
            'nombre' => 'Karlsruhe/Baden-Baden Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 48.778065,
            'longitud' => 8.082202,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDAC',
            'pais' => 'D',
            'nombre' => 'Altenburg Nobitz Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 50.980343,
            'longitud' => 12.507917,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDP',
            'pais' => 'D',
            'nombre' => 'Leipzig Halle Airport',
            'espaciosTotales' => 150,
            'costeOperacional' => 750,
            'latitud' => 51.419174,
            'longitud' => 12.230684,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDHL',
            'pais' => 'D',
            'nombre' => 'Lubeck Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 53.804855,
            'longitud' => 10.706313,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDFM',
            'pais' => 'D',
            'nombre' => 'Mannheim City Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 49.473680,
            'longitud' => 8.514396,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDJA',
            'pais' => 'D',
            'nombre' => 'Memmingen Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 350,
            'latitud' => 47.988270,
            'longitud' => 10.237795,
            'demanda' => 0.55,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDM',
            'pais' => 'D',
            'nombre' => 'Munich Airport',
            'espaciosTotales' => 400,
            'costeOperacional' => 2000,
            'latitud' => 48.353555,
            'longitud' => 11.786450,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDN',
            'pais' => 'D',
            'nombre' => 'Nuremberg Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 49.496593,
            'longitud' => 11.078123,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDLP',
            'pais' => 'D',
            'nombre' => 'Paderborn Lippstadt Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 51.61198,
            'longitud' => 8.616230,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'ETNL',
            'pais' => 'D',
            'nombre' => 'Rostock Laage Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 53.917973,
            'longitud' => 12.280778,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDR',
            'pais' => 'D',
            'nombre' => 'Saarbrucken Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 49.214649,
            'longitud' => 7.111971,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDS',
            'pais' => 'D',
            'nombre' => 'Stuttgart Airport',
            'espaciosTotales' => 300,
            'costeOperacional' => 1500,
            'latitud' => 48.689204,
            'longitud' => 9.218277,
            'demanda' => 0.89,
            'pasajerosEstimados' => 175,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDXW',
            'pais' => 'D',
            'nombre' => 'Sylt Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 54.913113,
            'longitud' => 8.340472,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDLV',
            'pais' => 'D',
            'nombre' => 'Weeze Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 850,
            'latitud' => 51.602420,
            'longitud' => 6.141204,
            'demanda' => 0.77,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EDDG',
            'pais' => 'D',
            'nombre' => 'Munster Osnabruck International Airport',
            'espaciosTotales' => 55,
            'costeOperacional' => 750,
            'latitud' => 52.133738,
            'longitud' => 7.688881,
            'demanda' => 0.71,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);



        /* ------------------- */
        /* Aeropuertos Francia */
        /* ------------------- */
        /* 
        MARK: Francia
        */
        Aeropuerto::create([
            'icao' => 'LFBA',
            'pais' => 'F',
            'nombre' => 'Agen La Garenne Airport',
            'espaciosTotales' => 20,
            'costeOperacional' => 200,
            'latitud' => 44.173986,
            'longitud' => 0.593099,
            'demanda' => 0.40,
            'pasajerosEstimados' => 45,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFKJ',
            'pais' => 'F',
            'nombre' => 'Ajaccio Napoleon Bonaparte Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 41.922838,
            'longitud' => 8.798466,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFJR',
            'pais' => 'F',
            'nombre' => 'Angers Loire Airport',
            'espaciosTotales' => 20,
            'costeOperacional' => 200,
            'latitud' => 47.561217,
            'longitud' => -0.312361,
            'demanda' => 0.40,
            'pasajerosEstimados' => 45,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFLW',
            'pais' => 'F',
            'nombre' => 'Aurillac Tronquieres Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 44.891922,
            'longitud' => 2.421332,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFSB',
            'pais' => 'F',
            'nombre' => 'Basel Mulhouse-Freiburg EuroAirport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 47.596357,
            'longitud' => 7.524924,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFKB',
            'pais' => 'F',
            'nombre' => 'Bastia Poretta Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 550,
            'latitud' => 42.550962,
            'longitud' => 9.482980,
            'demanda' => 0.72,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBE',
            'pais' => 'F',
            'nombre' => 'Bergerac Dordogne Perigord Airport',
            'espaciosTotales' => 30,
            'costeOperacional' => 300,
            'latitud' => 44.823526,
            'longitud' => 0.520371,
            'demanda' => 0.55,
            'pasajerosEstimados' => 55,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFMU',
            'pais' => 'F',
            'nombre' => 'Beziers Cap d\'Agde Airport',
            'espaciosTotales' => 30,
            'costeOperacional' => 300,
            'latitud' => 43.322570,
            'longitud' => 3.353320,
            'demanda' => 0.55,
            'pasajerosEstimados' => 55,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBZ',
            'pais' => 'F',
            'nombre' => 'Biarritz Pays Basque Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 600,
            'latitud' => 43.468390,
            'longitud' => -1.524213,
            'demanda' => 0.72,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRB',
            'pais' => 'F',
            'nombre' => 'Brest Bretagne Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 48.447009,
            'longitud' => -4.418610,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBD',
            'pais' => 'F',
            'nombre' => 'Bordeaux Merignac Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 44.829049,
            'longitud' => -0.712527,
            'demanda' => 0.85,
            'pasajerosEstimados' => 150,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRK',
            'pais' => 'F',
            'nombre' => 'Caen Carpiquet Airport',
            'espaciosTotales' => 20,
            'costeOperacional' => 200,
            'latitud' => 49.180096,
            'longitud' => -0.459633,
            'demanda' => 0.45,
            'pasajerosEstimados' => 45,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFKC',
            'pais' => 'F',
            'nombre' => 'Calvi Sainte-Catherine Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 42.527829,
            'longitud' => 8.792277,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFMK',
            'pais' => 'F',
            'nombre' => 'Carcassonne Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 43.215226,
            'longitud' => 2.308372,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFCK',
            'pais' => 'F',
            'nombre' => 'Castres Mazamet Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 43.554690,
            'longitud' => 2.290048,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFLB',
            'pais' => 'F',
            'nombre' => 'Chambery Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 400,
            'latitud' => 45.638129,
            'longitud' => 5.881332,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFLC',
            'pais' => 'F',
            'nombre' => 'Clermont-Ferrand Auvergne Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 45.786628,
            'longitud' => 3.169144,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRG',
            'pais' => 'F',
            'nombre' => 'Deauville Saint Gatien Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 49.364010,
            'longitud' => 0.155528,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRD',
            'pais' => 'F',
            'nombre' => 'Dinard Pleurtuit Saint-Malo Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 48.587684,
            'longitud' => -2.079946,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFGJ',
            'pais' => 'F',
            'nombre' => 'Dole Jura Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 47.041243,
            'longitud' => 5.427123,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFST',
            'pais' => 'F',
            'nombre' => 'Strasbourg Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 48.540128,
            'longitud' => 7.627532,
            'demanda' => 0.79,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFKF',
            'pais' => 'F',
            'nombre' => 'Figari Sud-Corse Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 41.501325,
            'longitud' => 9.097625,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFLS',
            'pais' => 'F',
            'nombre' => 'Grenoble Isere Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 45.362135,
            'longitud' => 5.331008,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);
        
        Aeropuerto::create([
            'icao' => 'LFBH',
            'pais' => 'F',
            'nombre' => 'La Rochelle Ile de Re Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 46.178414,
            'longitud' => -1.196661,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFQQ',
            'pais' => 'F',
            'nombre' => 'Lille Airport',
            'espaciosTotales' => 60,
            'costeOperacional' => 650,
            'latitud' => 50.566271,
            'longitud' => 3.098848,
            'demanda' => 0.72,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBL',
            'pais' => 'F',
            'nombre' => 'Limoges Bellegarde Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 45.861269,
            'longitud' => 1.179184,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRH',
            'pais' => 'F',
            'nombre' => 'Lorient South Brittany Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 47.760566,
            'longitud' => -3.439984,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFLL',
            'pais' => 'F',
            'nombre' => 'Lyon Saint Exupery Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 45.723972,
            'longitud' => 5.087814,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);
        
        Aeropuerto::create([
            'icao' => 'LFML',
            'pais' => 'F',
            'nombre' => 'Marseille Provence Airport',
            'espaciosTotales' => 220,
            'costeOperacional' => 1350,
            'latitud' => 43.437821,
            'longitud' => 5.213418,
            'demanda' => 0.88,
            'pasajerosEstimados' => 120,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFJL',
            'pais' => 'F',
            'nombre' => 'Metz-Nancy-Lorraine Airport',
            'espaciosTotales' => 33,
            'costeOperacional' => 330,
            'latitud' => 48.981266,
            'longitud' => 6.248530,
            'demanda' => 0.60,
            'pasajerosEstimados' => 55,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFMT',
            'pais' => 'F',
            'nombre' => 'Montpellier Mediterranee Airport',
            'espaciosTotales' => 150,
            'costeOperacional' => 1000,
            'latitud' => 43.579455,
            'longitud' => 3.966572,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRS',
            'pais' => 'F',
            'nombre' => 'Nantes Atlantique Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 47.156368,
            'longitud' => -1.606304,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFTW',
            'pais' => 'F',
            'nombre' => 'Nimes Ales Camargue Cevennes Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 43.758566,
            'longitud' => 4.416205,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFMN',
            'pais' => 'F',
            'nombre' => 'Nice Cote d\'Azur Airport',
            'espaciosTotales' => 220,
            'costeOperacional' => 1400,
            'latitud' => 43.662169,
            'longitud' => 7.216203,
            'demanda' => 0.88,
            'pasajerosEstimados' => 130,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFOB',
            'pais' => 'F',
            'nombre' => 'Paris Beauvais-Tille Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 49.456696,
            'longitud' => 2.115877,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFPG',
            'pais' => 'F',
            'nombre' => 'Paris Charles de Gaulle Airport',
            'espaciosTotales' => 450,
            'costeOperacional' => 2500,
            'latitud' => 49.009918,
            'longitud' => 2.551668,
            'demanda' => 0.99,
            'pasajerosEstimados' => 310,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFPO',
            'pais' => 'F',
            'nombre' => 'Paris Orly Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 48.729864,
            'longitud' => 2.367969,
            'demanda' => 0.88,
            'pasajerosEstimados' => 150,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFOK',
            'pais' => 'F',
            'nombre' => 'Paris Vatry Chalons Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 48.776247,
            'longitud' => 4.191486,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBP',
            'pais' => 'F',
            'nombre' => 'Pau Pyrenees Airport',
            'espaciosTotales' => 35,
            'costeOperacional' => 350,
            'latitud' => 43.380260,
            'longitud' => -0.415411,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFMP',
            'pais' => 'F',
            'nombre' => 'Perpignan Rivesaltes Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 400,
            'latitud' => 42.743346,
            'longitud' => 2.869256,
            'demanda' => 0.65,
            'pasajerosEstimados' => 70,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBI',
            'pais' => 'F',
            'nombre' => 'Poitiers - Biard Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 46.588427,
            'longitud' => 0.307676,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRQ',
            'pais' => 'F',
            'nombre' => 'Quimper Cornouaille Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 47.973768,
            'longitud' => -4.170985,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFRN',
            'pais' => 'F',
            'nombre' => 'Rennes Saint-Jacques Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 48.071377,
            'longitud' => -1.727918,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFCR',
            'pais' => 'F',
            'nombre' => 'Rodez Marcillac Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 44.408197,
            'longitud' => 2.484118,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFTZ',
            'pais' => 'F',
            'nombre' => 'Saint-Tropez La Mole Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 43.205455,
            'longitud' => 6.482094,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBT',
            'pais' => 'F',
            'nombre' => 'Tarbes-Lourdes-Pyrenees Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 43.181774,
            'longitud' => -0.004514,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFTH',
            'pais' => 'F',
            'nombre' => 'Toulon-Hyeres Airport',
            'espaciosTotales' => 45,
            'costeOperacional' => 450,
            'latitud' => 43.097374,
            'longitud' => 6.147649,
            'demanda' => 0.65,
            'pasajerosEstimados' => 64,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFBO',
            'pais' => 'F',
            'nombre' => 'Toulouse Blagnac Airport',
            'espaciosTotales' => 350,
            'costeOperacional' => 1500,
            'latitud' => 43.628694,
            'longitud' => 1.363907,
            'demanda' => 0.89,
            'pasajerosEstimados' => 125,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LFOT',
            'pais' => 'F',
            'nombre' => 'Tours Val de Loire Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 47.430996,
            'longitud' => 0.724941,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);


        /* ------------------ */
        /* Aeropuertos Italia */
        /* ------------------ */
        /* 
        MARK: Italia
        */

        Aeropuerto::create([
            'icao' => 'LIBP',
            'pais' => 'I',
            'nombre' => 'Pescara Abruzzo International Airport',
            'espaciosTotales' => 75,
            'costeOperacional' => 750,
            'latitud' => 42.430121,
            'longitud' => 14.183449,
            'demanda' => 0.70,
            'pasajerosEstimados' => 80,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIEA',
            'pais' => 'I',
            'nombre' => 'Alghero Fertilia Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 40.632262,
            'longitud' => 8.292244,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPY',
            'pais' => 'I',
            'nombre' => 'Ancona Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 350,
            'latitud' => 43.615196,
            'longitud' => 13.362474,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIBD',
            'pais' => 'I',
            'nombre' => 'Bari Karol Wojtyla Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 41.137479,
            'longitud' => 16.761285,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIME',
            'pais' => 'I',
            'nombre' => 'Milan Bergamo Orio al Serio International Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 45.667841,
            'longitud' => 9.707228,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPB',
            'pais' => 'I',
            'nombre' => 'Bolzano Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 46.462451,
            'longitud' => 11.327063,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIBR',
            'pais' => 'I',
            'nombre' => 'Brindisi Airport',
            'espaciosTotales' => 70,
            'costeOperacional' => 850,
            'latitud' => 40.659448,
            'longitud' => 17.947191,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIEE',
            'pais' => 'I',
            'nombre' => 'Cagliari Elmas Airport',
            'espaciosTotales' => 150,
            'costeOperacional' => 1000,
            'latitud' => 39.251549,
            'longitud' => 9.055915,
            'demanda' => 0.75,
            'pasajerosEstimados' => 85,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICC',
            'pais' => 'I',
            'nombre' => 'Catania Fontanarossa Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 37.467644,
            'longitud' => 15.066438,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICB',
            'pais' => 'I',
            'nombre' => 'Comiso Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 250,
            'latitud' => 36.997018,
            'longitud' => 14.609081,
            'demanda' => 0.60,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIRQ',
            'pais' => 'I',
            'nombre' => 'Florence Peretola Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 43.810728,
            'longitud' => 11.206317,
            'demanda' => 0.75,
            'pasajerosEstimados' => 90,
            'categoria' => 4,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIMJ',
            'pais' => 'I',
            'nombre' => 'Genoa Cristoforo Colombo Airport',
            'espaciosTotales' => 55,
            'costeOperacional' => 500,
            'latitud' => 44.413151,
            'longitud' => 8.843892,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICD',
            'pais' => 'I',
            'nombre' => 'Lampedusa Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 35.498993,
            'longitud' => 12.619474,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 4,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'LIML',
            'pais' => 'I',
            'nombre' => 'Milan Linate Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 45.450573,
            'longitud' => 9.277855,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIMC',
            'pais' => 'I',
            'nombre' => 'Milan Malpensa Airport',
            'espaciosTotales' => 400,
            'costeOperacional' => 2000,
            'latitud' => 45.627407,
            'longitud' => 8.729105,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIEO',
            'pais' => 'I',
            'nombre' => 'Olbia Costa Smeralda Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 40.900320,
            'longitud' => 9.518555,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICJ',
            'pais' => 'I',
            'nombre' => 'Palermo Falcone-Borsellino Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 38.181846,
            'longitud' => 13.105383,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICG',
            'pais' => 'I',
            'nombre' => 'Pantelleria Airport',
            'espaciosTotales' => 45,
            'costeOperacional' => 400,
            'latitud' => 36.816467,
            'longitud' => 11.968992,
            'demanda' => 0.65,
            'pasajerosEstimados' => 65,
            'categoria' => 4,
            'isla' => true,
        ]);

        Aeropuerto::create([
            'icao' => 'LIMP',
            'pais' => 'I',
            'nombre' => 'Parma Airport',
            'espaciosTotales' => 45,
            'costeOperacional' => 400,
            'latitud' => 44.826965,
            'longitud' => 10.297116,
            'demanda' => 0.65,
            'pasajerosEstimados' => 65,
            'categoria' => 3,
            'isla' => false,
        ]);
        
        Aeropuerto::create([
            'icao' => 'LICR',
            'pais' => 'I',
            'nombre' => 'Reggio Calabria Airport',
            'espaciosTotales' => 33,
            'costeOperacional' => 350,
            'latitud' => 38.072568,
            'longitud' => 15.650614,
            'demanda' => 0.55,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIRA',
            'pais' => 'I',
            'nombre' => 'Rome Ciampino Airport',
            'espaciosTotales' => 300,
            'costeOperacional' => 1750,
            'latitud' => 41.799142,
            'longitud' => 12.594950,
            'demanda' => 0.90,
            'pasajerosEstimados' => 250,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIRF',
            'pais' => 'I',
            'nombre' => 'Rome Leonardo da Vinci Fiumicino Airport',
            'espaciosTotales' => 450,
            'costeOperacional' => 2500,
            'latitud' => 41.805588,
            'longitud' => 12.255421,
            'demanda' => 0.99,
            'pasajerosEstimados' => 350,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICT',
            'pais' => 'I',
            'nombre' => 'Trapani Birgi Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 37.910832,
            'longitud' => 12.488929,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPH',
            'pais' => 'I',
            'nombre' => 'Venice Treviso Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 45.648469,
            'longitud' => 12.194058,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPQ',
            'pais' => 'I',
            'nombre' => 'Trieste Friuli Venezia Giulia Airport',
            'espaciosTotales' => 40,
            'costeOperacional' => 650,
            'latitud' => 45.827124,
            'longitud' => 13.470238,
            'demanda' => 0.45,
            'pasajerosEstimados' => 70,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIMF',
            'pais' => 'I',
            'nombre' => 'Turin Caselle Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 45.199829,
            'longitud' => 7.649575,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPZ',
            'pais' => 'I',
            'nombre' => 'Venice Marco Polo Airport',
            'espaciosTotales' => 400,
            'costeOperacional' => 2000,
            'latitud' => 45.505021,
            'longitud' => 12.349506,
            'demanda' => 0.97,
            'pasajerosEstimados' => 300,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPX',
            'pais' => 'I',
            'nombre' => 'Verona Airport',
            'espaciosTotales' => 100,
            'costeOperacional' => 1000,
            'latitud' => 45.397650,
            'longitud' => 10.889574,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPE',
            'pais' => 'I',
            'nombre' => 'Bologna Guglielmo Marconi Airport',
            'espaciosTotales' => 250,
            'costeOperacional' => 1500,
            'latitud' => 44.534860,
            'longitud' => 11.287633,
            'demanda' => 0.90,
            'pasajerosEstimados' => 230,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIPR',
            'pais' => 'I',
            'nombre' => 'Rimini Federico Fellini Airport',
            'espaciosTotales' => 25,
            'costeOperacional' => 250,
            'latitud' => 44.019386,
            'longitud' => 12.613390,
            'demanda' => 0.50,
            'pasajerosEstimados' => 50,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LICA',
            'pais' => 'I',
            'nombre' => 'Lamezia Terme Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 38.906236,
            'longitud' => 16.245666,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIRN',
            'pais' => 'I',
            'nombre' => 'Naples Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 40.885679,
            'longitud' => 14.290169,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'LIRP',
            'pais' => 'PH',
            'nombre' => 'Pisa Galileo Galilei Airport',
            'espaciosTotales' => 170,
            'costeOperacional' => 1100,
            'latitud' => 43.686161,
            'longitud' => 10.394942,
            'demanda' => 0.80,
            'pasajerosEstimados' => 90,
            'categoria' => 3,
            'isla' => false,
        ]);

        /* ------------------------ */
        /* Aeropuertos Paises Bajos */
        /* ------------------------ */
        /*
        MARK: Paises Bajos
        */

        Aeropuerto::create([
            'icao' => 'EHAM',
            'pais' => 'PH',
            'nombre' => 'Amsterdam Schiphol Airport',
            'espaciosTotales' => 450,
            'costeOperacional' => 2300,
            'latitud' => 52.310058,
            'longitud' => 4.749665,
            'demanda' => 0.99,
            'pasajerosEstimados' => 330,
            'categoria' => 1,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EHEH',
            'pais' => 'PH',
            'nombre' => 'Eindhoven Airport',
            'espaciosTotales' => 170,
            'costeOperacional' => 1000,
            'latitud' => 51.450408,
            'longitud' => 5.375081,
            'demanda' => 0.75,
            'pasajerosEstimados' => 90,
            'categoria' => 2,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EHGG',
            'pais' => 'PH',
            'nombre' => 'Groningen Airport Eelde',
            'espaciosTotales' => 30,
            'costeOperacional' => 330,
            'latitud' => 53.120174,
            'longitud' => 6.578394,
            'demanda' => 0.55,
            'pasajerosEstimados' => 60,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EHBK',
            'pais' => 'PH',
            'nombre' => 'Maastricht Aachen Airport',
            'espaciosTotales' => 50,
            'costeOperacional' => 500,
            'latitud' => 50.911535,
            'longitud' => 5.769991,
            'demanda' => 0.70,
            'pasajerosEstimados' => 75,
            'categoria' => 3,
            'isla' => false,
        ]);

        Aeropuerto::create([
            'icao' => 'EHRD',
            'pais' => 'PH',
            'nombre' => 'Rotterdam The Hague Airport',
            'espaciosTotales' => 200,
            'costeOperacional' => 1200,
            'latitud' => 51.957205,
            'longitud' => 4.443721,
            'demanda' => 0.85,
            'pasajerosEstimados' => 100,
            'categoria' => 3,
            'isla' => false,
        ]);


        // Plantilla
        /*
        Aeropuerto::create([
            'icao' => '',
            'pais' => 'PH',
            'nombre' => '',
            'espaciosTotales' => ,
            'costeOperacional' => ,
            'latitud' => ,
            'longitud' => ,
            'demanda' => ,
            'pasajerosEstimados' => ,
            'categoria' => ,
            'isla' => false,
        ]);
        */

    }
}
