<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use App\Models\User;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index()
    {
        $aeropuertos = Aeropuerto::all();
        $companyias = User::where('nombreCompanyia', '!=', 'null')->get();
        return view('competencia.index', ['aeropuertos' => $aeropuertos, 'companyias' => $companyias]);
    }

    public function demandaRuta(Request $request)
    {
        return view('competencia.demandaRuta');
    }

    public function rutasCompetencia()
    {

    }
}
