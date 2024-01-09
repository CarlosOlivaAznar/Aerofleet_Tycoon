<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Espacio;
use App\Models\Flota;
use App\Models\Ruta;

class RutasController extends Controller
{
    public function index()
    {
        $rutas = Ruta::where('user_id', auth()->id())->get();
        return view('rutas.index', ['rutas' => $rutas]);
    }

    public function crearRuta()
    {
        $espacios = Espacio::where('user_id', auth()->id())->get();
        $flota = Flota::where('user_id', auth()->id())->get();
        return view('rutas.crearRuta', ['espacios' => $espacios, 'flota' => $flota]);
    }

    public function nuevaRuta(Request $request)
    {
        if($request->destino1 !== $request->destino2){
            $espacioDep = Espacio::where('id', $request->destino1)->first();
            $espacioArr = Espacio::where('id', $request->destino2)->first();
            $avion = Flota::where('id', $request->avion)->first();

            //Comprobamos que los espacios y el avion pertenecen al usario
            if($espacioDep->user->id === auth()->id() && $espacioArr->user->id === auth()->id() && $avion->user->id === auth()->id()){

                $distancia = $this->calcularDistancia($espacioDep->aeropuerto->latitud, $espacioDep->aeropuerto->longitud, $espacioArr->aeropuerto->latitud, $espacioArr->aeropuerto->longitud);

                if($avion->avion->rango >= $distancia){

                    $tiempoRuta = $distancia * $avion->avion->tiempoPorKm;

                    $horaInicial = Carbon::createFromFormat('H:i:s', $request->horaDep);
                    $horaLlegada = Carbon::createFromFormat('H:i:s', $request->horaDep);
                    $horaLlegada->addMinutes($tiempoRuta);
                    $horaRuta = Carbon::createFromFormat('H:i:s', '00:00:00');
                    $horaRuta->addMinutes($tiempoRuta);

                    // Comprobamos que la hora de llegada es inferior al dia siguiente a las 4 de la mañana (hora limite para crear ruta)
                    if($horaLlegada->lt(Carbon::today()->addHours(4)->addDay())){
                        
                        Ruta::create([
                            'flota_id' => $avion->id,
                            'user_id' => auth()->id(),
                            'espacio_departure_id' => $espacioDep->id,
                            'espacio_arrival_id' => $espacioArr->id,
                            'horaInicio' => $horaInicial->format('H:i:s'),
                            'horaFin' => $horaLlegada->format('H:i:s'),
                            'distancia' => number_format($distancia, 2),
                            'tiempoEstimado' => $horaRuta->format('H:i:s'),
                        ]);
                    } else {
                        session()->flash('error', 'La hora de llegada excede el limite maximo de llegada (04:00:00z)');
                    }
                } else {
                    session()->flash('error', 'El avion tiene un rango inferior al de la ruta');
                }
            } else {
                session()->flash('error', 'error al validar los datos del usuario');
            }
        } else {
            session()->flash('error', 'El origen no puede ser el mismo que el destino');
        }

        return redirect()->route('rutas.index');
    }

    public function calcularDistancia($latitudDep, $longitudDep, $latitudArr, $longitudArr)
    {
        // Formula de Harvesine
        // https://www.genbeta.com/desarrollo/como-calcular-la-distancia-entre-dos-puntos-geograficos-en-c-formula-de-haversine

        // Convertir de grados a radianes
        $latitudDep = deg2rad($latitudDep);
        $longitudDep = deg2rad($longitudDep);
        $latitudArr = deg2rad($latitudArr);
        $longitudArr = deg2rad($longitudArr);

        // Radio de la tierra en km
        $R = 6378.0;

        $difLat = $latitudArr - $latitudDep;
        $difLong = $longitudArr - $longitudDep;

        $a = sin($difLat / 2) ** 2 + cos($latitudDep) * cos($latitudArr) * sin($difLong / 2) ** 2;

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distancia = $R * $c;

        return $distancia;
    }
}
