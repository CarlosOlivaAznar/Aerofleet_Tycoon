<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flota;
use App\Models\Avion;
use App\Models\User;

class FlotaController extends Controller
{
    public function index()
    {
        $flota = Flota::where('uid', '=', auth()->id())->get();
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('flota.index', ['flota' => $flota]);
    }

    public function comprarAviones()
    {
        return view('flota.comprarAviones');
    }

    public function comprarAirbus()
    {
        $aviones = Avion::all();

        return view('flota.caAirbus', compact($aviones));
    }

    public function comprar($id)
    {
        $avion = Avion::where('id', $id)->first();

        $user = User::find(auth()->id());;
        
        if ($user->saldo - $avion->precio >= 0) {
            Flota::create([
                'uid' => auth()->id(),
                'id_avion' => $id,
                'matricula' => 'EC-TEST',
                'modelo' => $avion->modelo,
                'fechaDeFabricacion' => $avion->fechaDeFabricacion,
                'estado' => 100,
                'status' => 'On ground',
                'precio' => $avion->precio,
                'rango' => $avion->rango,
                'img' => $avion->img,
            ]);

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - $avion->precio;
            $user->update();
        }
        
        return redirect()->route('flota.index');
    }
}
