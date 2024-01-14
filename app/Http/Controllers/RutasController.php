<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Espacio;
use App\Models\Flota;
use App\Models\Ruta;
use App\Models\User;

class RutasController extends Controller
{
    public function index()
    {
        $rutas = Ruta::where('user_id', auth()->id())->orderBy('horaInicio')->get();

        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('rutas.index', ['rutas' => $rutas]);
    }

    public function crearRuta()
    {
        $espacios = Espacio::where('user_id', auth()->id())->get();
        $flota = Flota::where('user_id', auth()->id())->get();
        return view('rutas.crearRuta', ['espacios' => $espacios, 'flota' => $flota]);
    }

    public function crearRutaAvion($id)
    {
        $espacios = Espacio::where('user_id', auth()->id())->get();
        $flota = Flota::where('user_id', auth()->id())->where('id', $id)->get();
        $rutas = Ruta::where('user_id', auth()->id())->where('flota_id', $id)->orderBy('horaInicio')->get();
        return view('rutas.crearRutaAvion', ['espacios' => $espacios, 'flota' => $flota, 'rutas' => $rutas]);
    }

    public function nuevaRuta(Request $request)
    {
        if($request->destino1 !== $request->destino2){
            $espacioDep = Espacio::where('id', $request->destino1)->first();
            $espacioArr = Espacio::where('id', $request->destino2)->first();
            $avion = Flota::where('id', $request->avion)->first();
            $rutas = Ruta::where('flota_id', $request->avion)->orderBy('horaInicio')->get();

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
                        // Comprueba que el origen es el mismo que el destino anterior o no hay nin ruta creada aun
                        if(count($rutas) === 0 || ($this->comprobarOrigen($rutas, $horaInicial, $espacioDep->aeropuerto->icao) && $this->horariosSuperpuestos($rutas, $horaInicial, $horaLlegada))){
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
                            session()->flash('exito', 'Ruta creada correctamente');
                        }
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

    public function comprobarOrigen($rutas, Carbon $horaInicial, $origen)
    {
        // Array que guarda las horas de llegada de todas las rutas del avion
        $horarios = array();
        foreach ($rutas as $ruta) {
            array_push($horarios, Carbon::createFromFormat('H:i:s', $ruta->horaFin));
        }

        // Ajustamos el formato del la hora que creara la ruta
        $horaInicial->format('H:i:s');

        // Filtramos las horas que estan detras de la hora de creacion de la ruta; Esto filtra para que seleccionemos solo el aeropuerto donde estara el avion segun el horario de la nueva ruta
        $horariosFiltrados = array_filter($horarios, function ($hora) use ($horaInicial) {
            return $hora < $horaInicial;
        });

        // Selecciona la hora maxima de todas; Para que seleccionemos el horario que este justo antes de la hora de salida de la nueva ruta
        $horaLlegada = count($horariosFiltrados) > 0 ? max($horariosFiltrados) : null;
        $icaoArrival = "";

        // Si $horaLlegada es nulo significa que no hay ninguna ruta antes de la nueva ruta, si el avion no tiene ninguna ruta no llega a esta funcion lo que tiene que siempre existir una ruta por detras de la nueva
        if($horaLlegada != null){
            foreach ($rutas as $ruta) {
                $comparacion = Carbon::createFromFormat('H:i:s', $ruta->horaFin);
                if($horaLlegada->eq($comparacion)){
                    $icaoArrival = $ruta->espacio_arrival->aeropuerto->icao;
                }
            }
            
            // Comprueba que el origen de la nueva ruta es el mismo que el destino de la ruta anterior
            if($icaoArrival === $origen){
                return true;
            } else {
                session()->flash('error', 'El origen tiene que ser el mismo que el destino de la ruta anterior');
                return false;
            }
        } else {
            session()->flash('error', 'La ruta se debe situar delante la ruta anterior');
            return false;
        }
    }

    public function horariosSuperpuestos($rutas, Carbon $horaInicial, Carbon $horaLlegada)
    {
        // Array que guarda las horas de llegada de todas las rutas del avion
        $horarios = array();
        foreach ($rutas as $ruta) {
            array_push($horarios, Carbon::createFromFormat('H:i:s', $ruta->horaInicio));
            array_push($horarios, Carbon::createFromFormat('H:i:s', $ruta->horaFin));
        }

        $comprobacionHorario = false;

        // Comprobar cada horario
        foreach ($horarios as $horario) {
            if ($horario->between($horaInicial, $horaLlegada)) {
                $comprobacionHorario = true;
            }
        }

        if(!$comprobacionHorario){
            return true;
        } else {
            session()->flash('error', 'El horario de la nueva ruta se superpone a otro ya creado');
            return false;
        }
    }

    public function borrarRuta($id)
    {
        $ruta = Ruta::where('id', $id)->first();

        if($ruta->user_id === auth()->id()){
            $ruta->delete();
            session()->flash('exito', 'Ruta eliminada correctamente');
        } else {
            session()->flash('error', 'error al eliminar la ruta');
        }

        return redirect()->route('rutas.index');
    }
}
