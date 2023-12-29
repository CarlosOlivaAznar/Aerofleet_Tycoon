<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    public function index()
    {
        return view('rutas.index');
    }
}
