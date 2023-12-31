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
        return view('espacios.index');
    }
}
