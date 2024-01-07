<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Espacio;
use App\Models\Flota;

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
        
    }
}
