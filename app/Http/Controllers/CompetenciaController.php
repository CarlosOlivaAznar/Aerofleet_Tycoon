<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index()
    {
        $aeropuertos = Aeropuerto::all();
        return view('competencia.index', ['aeropuertos' => $aeropuertos]);
    }
}
