<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flota;

class FlotaController extends Controller
{
    public function index()
    {
        return view('flota.index');
    }

    public function comprarAviones()
    {
        return view('flota.comprarAviones');
    }

    public function comprarAirbus()
    {
        return view('flota.caAirbus');
    }
}
