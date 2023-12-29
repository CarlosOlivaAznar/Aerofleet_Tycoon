<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flota;
use App\Models\Avion;

class FlotaController extends Controller
{
    public function index()
    {
        $flota = Flota::where('uid', '=', auth()->id())->get();

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

        return redirect()->route('flota.index');
    }
}
