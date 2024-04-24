<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use App\Models\Espacio;
use App\Models\Ruta;
use App\Models\User;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index()
    {
        $aeropuertos = Aeropuerto::all();
        $companyias = User::where('nombreCompanyia', '!=', 'null')->get();
        return view('competencia.index', ['aeropuertos' => $aeropuertos, 'companyias' => $companyias]);
    }

    public function demandaRuta(Request $request)
    {
        $origen = $request->origenHid;
        $destino = $request->destinoHid;
        
        if($origen != null && $destino != null){
            $grupoRutas = Ruta::join('espacios as e', 'rutas.espacio_departure_id', '=', 'e.id')
            ->join('espacios as es', 'rutas.espacio_arrival_id', '=', 'es.id')
            ->where('e.aeropuerto_id', $origen)
            ->where('es.aeropuerto_id', $destino)
            ->select('rutas.*')
            ->get()->groupBy('user_id');
            
            return view('competencia.demandaRuta', ['grupoRutas' => $grupoRutas]);
        } else {

            return redirect()->route('competencia.index');
        }
        
    }

    public function rutasCompetencia(Request $request)
    {
        $grupoRutas = Ruta::where('user_id', $request->companyiaHid)->get()->groupBy('flota_id');
        $nombreC = $request->busquedaCompanyia;
        return view('competencia.rutasCompetencia', ['grupoRutas' => $grupoRutas, 'nombreC' => $nombreC]);
    }
}
