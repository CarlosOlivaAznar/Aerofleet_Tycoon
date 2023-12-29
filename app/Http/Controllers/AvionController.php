<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avion;

class AvionController extends Controller
{
    public function comprarAirbus()
    {
        $aviones = Avion::all();

        return view('flota.caAirbus', ['aviones' => $aviones]);
    }
}
