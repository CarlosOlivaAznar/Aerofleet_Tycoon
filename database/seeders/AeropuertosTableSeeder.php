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
            'latitud' => 35.278598,
            'longitud' => -2.956094,
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
            'espaciosTotales' => 300,
            'costeOperacional' => 1450,
            'latitud' => 55.949532,
            'longitud' => -3.361085,
            'demanda' => 0.88,
            'pasajerosEstimados' => 200,
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
        ]);

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
        ]);

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
        ]);



        /* -------------------- */
        /* Aeropuertos Alemania */
        /* -------------------- */

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
        ]);

        Aeropuerto::create([
            'icao' => 'EDDL',
            'pais' => 'D',
            'nombre' => 'Dusseldorf International Airport',
            'espaciosTotales' => 350,
            'costeOperacional' => 1700,
            'latitud' => 51.286522,
            'longitud' => 6.766367,
            'demanda' => 200,
            'pasajerosEstimados' => 0.85,
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
        ]);



        /* ------------------- */
        /* Aeropuertos Francia */
        /* ------------------- */
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
        ]);

        // Plantilla
        /*
        Aeropuerto::create([
            'icao' => '',
            'pais' => 'F',
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
