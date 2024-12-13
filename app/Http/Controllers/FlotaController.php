<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flota;
use App\Models\Avion;
use App\Models\Avionsh;
use App\Models\Ruta;
use App\Models\Sede;
use App\Models\User;

class FlotaController extends Controller
{
    public function index()
    {
        $flota = Flota::where('user_id', '=', auth()->id())->get();
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('flota.index', ['flota' => $flota]);
    }

    public function comprarAviones()
    {
        $avionessh = Avionsh::all();
        return view('flota.comprarAviones', ['avionessh' => $avionessh]);
    }

    public function comprarAirbus()
    {
        $aviones = Avion::where('fabricante', 'Airbus')->orderBy('precio')->get();
        return view('flota.caAirbus', ['aviones' => $aviones]);
    }

    public function comprarBoeing()
    {
        $aviones = Avion::where('fabricante', 'Boeing')->orderBy('precio')->get();
        return view('flota.caBoeing', ['aviones' => $aviones]);
    }

    public function comprarEmbraer()
    {
        $aviones = Avion::where('fabricante', 'Embraer')->orderBy('precio')->get();
        return view('flota.caEmbraer', ['aviones' => $aviones]);
    }

    public function comprarBombardier()
    {
        $aviones = Avion::where('fabricante', 'Bombardier')->orderBy('precio')->get();
        return view('flota.caBombardier', ['aviones' => $aviones]);
    }

    public function comprar($id)
    {
        $avion = Avion::where('id', $id)->first();
        $user = User::find(auth()->id());
        $matricula = $this->generarMatricula();
        
        if ($user->saldo - $avion->precio >= 0) {
            Flota::create([
                'user_id' => auth()->id(),
                'avion_id' => $id,
                'matricula' => $matricula,
                'fechaDeFabricacion' => now(),
                'condicion' => 100,
                'estado' => 0,
            ]);

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - $avion->precio;
            $user->update();

            // Mostramos mensaje
            session()->flash('exito', trans('fleet.buySucces'));
        } else {
            // Mensaje error
            session()->flash('error', trans('fleet.neCash'));
        }
        
        return redirect()->route('flota.index');
    }

    public function comprarSegundaMano($id)
    {
        $avionsh = Avionsh::where('id', $id)->first();
        $user = User::find(auth()->id());;
        $avionNuevo = Avionsh::avionAleatiorio();
        $matricula = $this->generarMatricula();
        
        if ($user->saldo - ($avionsh->avion->precio * ($avionsh->condicion / 100)) >= 0) {
            Flota::create([
                'user_id' => auth()->id(),
                'avion_id' => $avionsh->avion_id,
                'matricula' => $matricula,
                'fechaDeFabricacion' => $avionsh->fechaDeFabricacion,
                'condicion' => $avionsh->condicion,
                'estado' => 0,
            ]);

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - ($avionsh->avion->precio * ($avionsh->condicion / 100));
            $user->update();

            // Borramos el avion de segunda mano y introducimos uno nuevo en la tabla
            $avionsh->delete();
            Avionsh::create([
                'avion_id' => $avionNuevo[0],
                'fechaDeFabricacion' => date("Y-m-d", mt_rand(strtotime("2000-01-01"), strtotime("2015-12-31"))),
                'img' => $avionNuevo[1],
                'companyia' => $avionNuevo[2],
                'condicion' => rand(60, 90),
            ]);

            // Mostramos mensaje
            session()->flash('exito', trans('fleet.buySucces'));
        } else {
            session()->flash('error', trans('fleet.neCash'));
        }

        return redirect()->route('flota.index');
    }

    public function vender($id)
    {
        $avion = Flota::where('id', $id)->first();

        // Comprobamos que el uid del usuario logeado coincide con el uid del avion de la flota
        if($avion->user_id === auth()->id()) {
            $user = User::find(auth()->id());;
            $user->saldo = $user->saldo + $avion->precioVenta();

            $user->update();
            $avion->delete();

            // Mostramos mensaje
            session()->flash('exito', trans('fleet.sellSucces'));
        } else {
            session()->flash('error', trans('fleet.nyProperty'));
        }

        return redirect()->route('flota.index');
    }

    public function mantenimiento($id)
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $flotaC = count(Flota::where('user_id', auth()->id())->where('estado', 2)->get());
        $espacios = 0;

        if($sede->hangar){
            // Se cuentan los espacios estan ocupados por aviones en mantenimiento
            foreach ($sede->hangar as $hangar) {
                $espacios += $hangar->espacios;
            }
        }

        // Si hay mas espacios que aviones en mantenimiento se envia el nuevo avion a mantenimiento
        if($espacios > $flotaC){
            // Obtenemos el avion que hay que mandar a mantenimiento
            $avion = Flota::find($id);
            if($avion->user_id === auth()->id()){
                $avion->estado = 2;
                $avion->update();
            } else {
                session()->flash('error', trans('fleet.nyProperty'));
            }
        } else {
            session()->flash('error', trans('fleet.neSpaces'));
        }

        return redirect()->route('flota.index'); 
    }

    /**
     * Las matriculas de los aviones varian de pais a pais
     * Cada uno tiene un prefijo propio, en España es EC- en
     * Reino Unido es G- en Alemania es D-.
     * El sufijo de las matriculas tambien varia algunos contienen 
     * 3 letras como en españa y en la mayoria de paises como 
     * por ejemplo "EC-MLD", pero en 
     * otros paises puede variar el sufijo y ser de 4 letras 
     * o contener numeros. Para mayor simpleza el prefijo 
     * sera el del pais y el sufijo se mantendra de 3 letras sin numeros
     */
    public function generarMatricula()
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        // Seleccionamos la matricula con mayor valor alfabeticamente
        $matriculaMax = Flota::where('matricula', 'LIKE', $sede->aeropuerto->pais.'%')->max('matricula');

        // si matriculaMax esta vacia quiere decir que es el primer avion que se compra de ese pais, devolvemos una matricula nueva con "AAA"
        if(strlen($matriculaMax) === 0){
            return $sede->aeropuerto->pais . "-AAA";
        }
        
        $sufijo = explode("-", $matriculaMax)[1];

        // Pasamos la cadena a un numero en base 26
        $sufijoNum = 0;
        for ($i=0; $i < strlen($sufijo); $i++) { 
            $sufijoNum *= 26;
            $sufijoNum += ord($sufijo[$i]) - ord('A') + 1;
        }

        // Sumamos un caracter a la cadena
        $sufijoNum++;

        // Hacemos el cambio pero al reves, pasamos de un numero en base 26 a una cadena de caracteres
        $resultado = "";
        while($sufijoNum > 0){
            $cambio = ($sufijoNum - 1) % 26;
            $resultado = chr($cambio + ord('A')) . $resultado;
            $sufijoNum = intval(($sufijoNum - $cambio) / 26);
        }
        
        return $sede->aeropuerto->pais . "-" . $resultado;
    }

    public function activarRuta($id)
    {
        $avion = Flota::where('user_id', auth()->id())->where('id', $id)->first();
        if($avion->estado == 0 && $this->comprobarActivar($avion)){
            $avion->estado = 3;
            $avion->activacion = now()->addDay();
            $avion->update();
            session()->flash('exito', trans('fleet.routeSucces'));
        } else if($avion->estado == 1){
            session()->flash('warning', trans('fleet.alreadyActivated'));
        } else if($avion->estado == 2){
            session()->flash('error', trans('fleet.planeMaintenance'));
        }

        return redirect()->route('rutas.index');
    }

    public function comprobarActivar(Flota $avion)
    {
        $rutas = Ruta::where('flota_id', $avion->id)->orderBy('horaInicio')->get();

        $destino = null;
        foreach ($rutas as $ruta) {
            // La primera vez que entra en el bucle la variable esta en null, al ser la primera ruta no necesita comprobacion
            if($destino != null){
                // Comprueba que el aerpuerto de origen es el mismo que el de destino de la ruta anterior
                if($ruta->espacio_departure->aeropuerto->icao != $destino){
                    session()->flash('error', trans('fleet.errCreateRoute'));
                    return false;
                }
            }
            $destino = $ruta->espacio_arrival->aeropuerto->icao;
        }
        
        return true;
    }
}
