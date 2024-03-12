<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flota;
use App\Models\Avion;
use App\Models\Avionsh;
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
        $aviones = Avion::where('fabricante', 'Airbus')->get();
        return view('flota.caAirbus', ['aviones' => $aviones]);
    }

    public function comprarBoeing()
    {
        $aviones = Avion::where('fabricante', 'Boeing')->get();
        return view('flota.caBoeing', ['aviones' => $aviones]);
    }

    public function comprar($id)
    {
        $avion = Avion::where('id', $id)->first();
        $user = User::find(auth()->id());
        
        if ($user->saldo - $avion->precio >= 0) {
            Flota::create([
                'user_id' => auth()->id(),
                'avion_id' => $id,
                'matricula' => 'EC-TEST',
                'fechaDeFabricacion' => date('Y-m-d'),
                'condicion' => 100,
                'estado' => 'On ground',
            ]);

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - $avion->precio;
            $user->update();

            // Mostramos mensaje
            session()->flash('exito', 'El avion se ha comprado correctamente');
        } else {
            // Mensaje error
            session()->flash('error', 'No tiene suficiente saldo');
        }
        
        return redirect()->route('flota.index');
    }

    public function comprarSegundaMano($id)
    {
        $avionsh = Avionsh::where('id', $id)->first();
        $user = User::find(auth()->id());;
        $avionNuevo = Avionsh::avionAleatiorio();
        
        if ($user->saldo - ($avionsh->avion->precio * ($avionsh->condicion / 100)) >= 0) {
            Flota::create([
                'user_id' => auth()->id(),
                'avion_id' => $avionsh->avion_id,
                'matricula' => 'EC-TEST',
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
                'condicion' => rand(30, 80),
            ]);

            // Mostramos mensaje
            session()->flash('exito', 'El avion se ha comprado correctamente');
        } else {
            session()->flash('error', 'No tiene suficiente saldo');
        }

        return redirect()->route('flota.index');
    }

    public function vender($id)
    {
        $avion = Flota::where('id', $id)->first();

        // Comprobamos que el uid del usuario logeado coincide con el uid del avion de la flota
        if($avion->user_id === auth()->id()) {
            $user = User::find(auth()->id());;
            $user->saldo = $user->saldo + ($avion->avion->precio * ($avion->condicion / 100));

            $user->update();
            $avion->delete();

            // Mostramos mensaje
            session()->flash('exito', 'El avion se ha vendido correctamente');
        } else {
            session()->flash('error', 'Error al vender el avion');
        }

        return redirect()->route('flota.index');
    }
}
