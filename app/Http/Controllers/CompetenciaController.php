<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use App\Models\Espacio;
use App\Models\Ruta;
use App\Models\User;
use Carbon\Carbon;
use DeepCopy\f013\C;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index()
    {
        $aeropuertos = Aeropuerto::all();
        $companyias = User::where('nombreCompanyia', '!=', 'null')->get();

        $rutas = Ruta::all();
        $avionesVolando = array();

        foreach ($rutas as $ruta) {
            $horaInicio = Carbon::createFromFormat('H:i:s', $ruta->horaInicio);
            $horaFin = Carbon::createFromFormat("H:i:s", $ruta->horaFin);

            // Si las horas de inicio o fin estan comprendidas entre las 00:00z y 04:00z
            // Quiere decir que ese horario ya es del dia siguiente ya que excede el limite de hora
            // Entonces se le suma un dia al horario
            // Esto sucede ya que los horarios de las rutas solo guardamos las horas y no los dias como es obvio
            if($horaInicio->between(Carbon::today()->addHours(0), Carbon::today()->addHours(4))){
                $horaInicio->addDay(1);
            }

            if($horaFin->between(Carbon::today()->addHours(0), Carbon::today()->addHours(4))){
                $horaFin->addDay(1);
            }

            // Calculamos los aviones que estan volando en estos mismos instantes
            if(now()->between($horaInicio, $horaFin) && $ruta->flota->estado === 1){
                array_push($avionesVolando, $ruta->calcularPosicion($horaInicio));
            }
        }

        return view('competencia.index', ['aeropuertos' => $aeropuertos, 'companyias' => $companyias, 'avionesVolando' => $avionesVolando]);
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

    public function rankings()
    {
        $usuariosa = User::whereNotNull('email_verified_at')->get();

        $usuarios = $usuariosa->sortByDesc(function ($usuario) {
            return $usuario->patrimonio();
        });

        return view('competencia.rankings', ['usuarios' => $usuarios]);
    }

    
}
