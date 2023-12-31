<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Espacio;
use App\Models\Aeropuerto;

class EspaciosController extends Controller
{
    public function index()
    {
        $espacios = Espacio::where('user_id', auth()->id())->get();
        return view('espacios.index', ['espacios' => $espacios]);
    }

    public function aeropuertos()
    {
        $aeropuertos = Aeropuerto::all();
        return view('espacios.comprarEspacios', ['aeropuertos' => $aeropuertos]);
    }

    public function comprar(Request $request)
    {
        $aeropuerto = Aeropuerto::where('icao', $request->aeropuerto)->first();

        Espacio::create([
            'aeropuerto_id' => $aeropuerto->id,
            'user_id' => auth()->id(),
            'numeroDeEspacios' => $request->espacios,
        ]);

        return redirect()->route('espacios.index');
    }
}
