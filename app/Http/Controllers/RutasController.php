<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;

use App\Models\Espacio;
use App\Models\Flota;
use App\Models\Ruta;

class RutasController extends Controller
{
    public function index()
    {
        return view('rutas.index');
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
                

                Ruta::create([
                    'flota_id',
                    'espacio_departure_id',
                    'espacio_arrival_id',
                    'horaInicio' => $request->horaDep,
                    'horaFin',
                    'distancia',
                    'tiempoEstimado',
                ]);
            } else {
                session()->flash('error', 'error al validar los datos del usuario');
            }
        } else {
            session()->flash('error', 'El origen no puede ser el mismo que el destino');
        }

        return redirect()->route('rutas.index');
    }

    public function calcularDistancia()
    {

    }
}
