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
        $grupoRutas = Ruta::where('user_id', auth()->id())
                        ->orderBy('flota_id')
                        ->orderBy('horaInicio')
                        ->get()
                        ->groupBy('flota_id');;
        
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('rutas.index', ['grupoRutas' => $grupoRutas]);
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
        // Comprobar que los destinos son diferentes
        if ($request->destino1 === $request->destino2) {
            return $this->redirectWithError('routes.arrDestEq');
        }

        $espacioDep = Espacio::find($request->destino1);
        $espacioArr = Espacio::find($request->destino2);
        $avion = Flota::find($request->avion);

        // Comprobamos la categoria de los aviones sea la correcta
        if ($this->exceedsCategory($espacioDep, $espacioArr, $avion)) {
            return $this->redirectWithError('routes.maxSize');
        }

        // Comprobamos que los recursos sean propiedad del usuario
        if (!$this->userOwnsResources($espacioDep, $espacioArr, $avion)) {
            return $this->redirectWithError('routes.userErr');
        }

        // Comprobar que hay espacios disponibles adquiridos por el usuario
        if ($espacioDep->espaciosDisponibles() <= 0 || $espacioArr->espaciosDisponibles() <= 0) {
            return $this->redirectWithError('routes.noSlotsAva');
        }

        $distancia = $this->calcularDistancia(
            $espacioDep->aeropuerto->latitud,
            $espacioDep->aeropuerto->longitud,
            $espacioArr->aeropuerto->latitud,
            $espacioArr->aeropuerto->longitud
        );

        // Comprobar que el rango del avion esta dentro de la distancia de la nueva ruta
        if ($avion->avion->rango < $distancia) {
            return $this->redirectWithError('routes.maxRange');
        }

        $tiempoRuta = $distancia * $avion->avion->tiempoPorKm;
        $horaInicial = Carbon::createFromFormat('H:i:s', $request->horaDep);
        $horaLlegada = (clone $horaInicial)->addMinutes($tiempoRuta);
        
        // Comprobar que no se supera los limites de horario de la ruta
        if (!$this->isArrivalWithinLimit($horaLlegada)) {
            return $this->redirectWithError('routes.maxTime');
        }

        // Comprueba que la nueva ruta es compatible con las rutas anteriores
        $rutas = Ruta::where('flota_id', $request->avion)->orderBy('horaInicio')->get();
        if (!$this->isValidRouteSchedule($rutas, $horaInicial, $horaLlegada, $espacioDep, $espacioArr)) {
            return $this->redirectWithError('');
        }

        // Crear la nueva ruta
        Ruta::create([
            'flota_id' => $avion->id,
            'user_id' => auth()->id(),
            'espacio_departure_id' => $espacioDep->id,
            'espacio_arrival_id' => $espacioArr->id,
            'horaInicio' => $horaInicial->format('H:i:s'),
            'horaFin' => $horaLlegada->format('H:i:s'),
            'distancia' => round($distancia, 2),
            'tiempoEstimado' => gmdate('H:i:s', $tiempoRuta * 60),
            'precioBillete' => $request->precioBillete,
        ]);

        $avion->estado = 0;
        $avion->update();

        session()->flash('exito', trans('routes.routeCreated'));
        return redirect()->route('rutas.index');
    }

    private function redirectWithError($errorKey)
    {
        if(strlen($errorKey) > 0) {
            session()->flash('error', trans($errorKey));
        }
        return redirect()->back()->withInput();
    }

    private function exceedsCategory($espacioDep, $espacioArr, $avion)
    {
        return $espacioDep->aeropuerto->categoria > $avion->avion->categoria ||
            $espacioArr->aeropuerto->categoria > $avion->avion->categoria;
    }

    private function userOwnsResources($espacioDep, $espacioArr, $avion)
    {
        $userId = auth()->id();
        return $espacioDep->user->id === $userId &&
            $espacioArr->user->id === $userId &&
            $avion->user->id === $userId;
    }

    private function isArrivalWithinLimit($horaLlegada)
    {
        return $horaLlegada->lt(Carbon::today()->addHours(4)->addDay());
    }

    private function isValidRouteSchedule($rutas, $horaInicial, $horaLlegada, $espacioDep, $espacioArr)
    {
        return count($rutas) === 0 ||
            ($this->comprobarOrigen($rutas, $horaInicial, $espacioDep->aeropuerto->icao) &&
                $this->comprobarDestino($rutas, $horaInicial, $espacioArr->aeropuerto->icao) &&
                $this->horariosSuperpuestos($rutas, $horaInicial, $horaLlegada));
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
            $hora = Carbon::createFromFormat('H:i:s', $ruta->horaFin);

            // Comprobamos que la hora de llegada sea despues de las 12 de la noche para añadir un dia a la hora, si no guardamos la hora normal a dia de hoy para hacer la comprobacion
            if($hora->gt(Carbon::createFromFormat('H:i:s', '00:00:00')) && $hora->lt(Carbon::createFromFormat('H:i:s', '05:00:00'))) {
                array_push($horarios, $hora->addDay());
            } else {
                array_push($horarios, $hora);
            }
        }

        // Ajustamos el formato del la hora que creara la ruta
        $horaInicial->format('H:i:s');

        // Filtramos las horas que estan detras de la hora de creacion de la ruta; Esto filtra para que seleccionemos solo el aeropuerto donde estara el avion segun el horario de la nueva ruta
        $horariosFiltrados = array_filter($horarios, function ($hora) use ($horaInicial) {
            return $hora->lt($horaInicial);
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
                if($horaLlegada->addMinutes(30)->gt($horaInicial)) {
                    session()->flash('error', trans('routes.minSeparation'));
                    return false;
                }
                
                return true;

            } else {
                session()->flash('error', trans('routes.arrEqArrPRoute'));
                return false;
            }
        } else {
            return true;
        }
    }

    public function comprobarDestino($rutas, Carbon $horaInicial, $destino)
    {
        // Array que guarda las horas de llegada de todas las rutas del avion
        $horarios = array();
        foreach ($rutas as $ruta) {
            array_push($horarios, Carbon::createFromFormat('H:i:s', $ruta->horaInicio));
        }

        // Ajustamos el formato del la hora que creara la ruta
        $horaInicial->format('H:i:s');

        // Filtramos las horas que estan por delante de la hora de creacion de la ruta; Esto filtra igual que la funcion de comprobarOrigen, pero aqui se busca el aeropuerto de destino
        $horariosFiltrados = array_filter($horarios, function ($hora) use ($horaInicial) {
            return $hora > $horaInicial;
        });

        // Selecciona la hora minima de todas; Para que el horario sea el mas proximo a la ruta nueva
        $horaInicio = count($horariosFiltrados) > 0 ? min($horariosFiltrados) : null;
        $icaoDest = "";
        
        if($horaInicio != null){
            foreach ($rutas as $ruta) {
                $comparacion = Carbon::createFromFormat('H:i:s', $ruta->horaInicio);
                if($horaInicio->eq($comparacion)){
                    $icaoDest = $ruta->espacio_departure->aeropuerto->icao;
                }
            }
            
            // Comprueba que el origen de la nueva ruta es el mismo que el destino de la ruta anterior
            if($icaoDest === $destino){
                return true;
            } else {
                session()->flash('error', trans('routes.destNEq'));
                return false;
            }
        } else {
            return true;
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
            session()->flash('error', trans('routes.mixingRoutesErr') . ", ETA: " . $horaLlegada->format('H:i:s'));
            return false;
        }
    }

    public function borrarRuta($id)
    {
        $ruta = Ruta::where('id', $id)->first();

        if($ruta->user_id === auth()->id()){
            $ruta->flota->estado = 0;
            $ruta->flota->update();
            $ruta->delete();
            session()->flash('exito', trans('routes.deleteSuccess'));
        } else {
            session()->flash('error', trans('routes.deleteErr'));
        }

        return redirect()->route('rutas.index');
    }

    public function modificarRuta($id, Request $request)
    {
        $ruta = Ruta::find($id);

        if($ruta->user_id === auth()->id()){
            $ruta->precioBillete = $request->precioBillete;
            $ruta->save();
            session()->flash('exito', trans('routes.modSuccess'));
        } else {
            session()->flash('error', trans('routes.modErr'));
        }

        return redirect()->route('rutas.index');
    }
}
