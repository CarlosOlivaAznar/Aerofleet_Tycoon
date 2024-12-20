<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avion;
use Illuminate\Http\Request;

class EconomiaController extends Controller
{
    public function index()
    {
        return view('economia.index');
    }

    public function leasing()
    {
        return view('economia.leasing');
    }

    public function leasingCompanyia($id)
    {
        switch ($id) {
            case 1:
                $nombre = "AerCap";
                $aviones = Avion::where('fabricante', 'Airbus')->where('primeraMano', 1)->get();
                break;
            case 2:
                $nombre = "AirLease Corporation";
                $aviones = Avion::where('fabricante', 'Boeing')->where('primeraMano', 1)->get();
                break;
            case 3:
                $nombre = "Avolon";
                $aviones = Avion::where('fabricante', 'Bombardier')->where('primeraMano', 1)->get();
                break;
            case 4:
                $nombre = "SMBC Aviation";
                $aviones = Avion::where('fabricante', 'Embraer')->where('primeraMano', 1)->get();
                break;
            default:
                $nombre = "AerCap";
                $aviones = Avion::where('fabricante', 'Airbus')->where('primeraMano', 1)->get();
                break;
        }

        return view('economia.contratarLeasing', ['aviones' => $aviones, 'nombre' => $nombre]);
    }

    public function contratarLeasing(Request $request)
    {
        dd($request);

        return redirect()->route('economia.leasing');
    }
}
