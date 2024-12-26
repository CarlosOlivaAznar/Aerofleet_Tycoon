<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avion;
use App\Models\Flota;
use App\Models\User;
use Illuminate\Http\Request;

class EconomiaController extends Controller
{
    public function index()
    {
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);
        return view('economia.index');
    }

    public function leasing()
    {
        $leasings = Flota::where('user_id', auth()->id())->where('leasing', true)->get();
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('economia.leasing', ['leasings' => $leasings]);
    }

    public function leasingCompanyia($id)
    {
        switch ($id) {
            case 1:
                $nombre = "AerCap";
                $aviones = Avion::where('fabricante', 'Airbus')->where('primeraMano', 1)->orderBy('precio')->get();
                break;
            case 2:
                $nombre = "AirLease Corporation";
                $aviones = Avion::where('fabricante', 'Boeing')->where('primeraMano', 1)->orderBy('precio')->get();
                break;
            case 3:
                $nombre = "Avolon";
                $aviones = Avion::where('fabricante', 'Bombardier')->where('primeraMano', 1)->orderBy('precio')->get();
                break;
            case 4:
                $nombre = "SMBC Aviation";
                $aviones = Avion::where('fabricante', 'Embraer')->where('primeraMano', 1)->orderBy('precio')->get();
                break;
            default:
                $nombre = "AerCap";
                $aviones = Avion::where('fabricante', 'Airbus')->where('primeraMano', 1)->orderBy('precio')->get();
                break;
        }

        return view('economia.contratarLeasing', ['aviones' => $aviones, 'nombre' => $nombre]);
    }

    public function contratarLeasing(Request $request)
    {
        $avion = Avion::find($request->avion);
        $leasings = Flota::where('user_id', auth()->id())->where('leasing', true)->get();
        $usuario = User::find(auth()->id());
        
        if(!$avion->primeraMano) {
            session()->flash('error', trans('economy.leasingNotFirstHand'));
            return redirect()->route('economia.leasing');
        }

        if(count($leasings) > 4) {
            session()->flash('error', trans('economy.leasingMaxLimit'));
            return redirect()->route('economia.leasing');
        }

        if($avion->precio > 200000000 && $usuario->patrimonio() < 250000000) {
            session()->flash('error', trans('economy.leasingMinAssets'));
            return redirect()->route('economia.leasing');
        }

        Flota::create([            
            'user_id' => auth()->id(),
            'avion_id' => $avion->id,
            'matricula' => $avion->generarMatricula(),
            'fechaDeFabricacion' => now(),
            'condicion' => 100,
            'estado' => 0,
            'leasing' => true,
            'finLeasing' => now()->addDays($request->dias),
        ]);

        session()->flash('exito', trans('economy.leasingSuccess'));
        return redirect()->route('economia.leasing');
    }

    public function finLeasing($id)
    {
        $leasing = Flota::find($id);

        $usuario = User::find(auth()->id());
        $usuario->saldo -= $leasing->avion->leasePPD();
        $usuario->update();

        $leasing->delete();

        session()->flash('exito', trans('economy.successEndLease'));
        return redirect()->route('economia.leasing');
    }


    // Prestamos

    public function prestamos()
    {
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('economia.prestamo');
    }

    public function contratarPrestamo($id)
    {
        switch ($id) {
            case 1:
                $limiteMeses = 3;
                $limitePrestamo = 5000000;
                break;
            case 2:
                $limiteMeses = 12;
                $limitePrestamo = 50000000;
                break;
            case 3:
                $limiteMeses = 39;
                $limitePrestamo = 250000000;
                break;
            default:
                $limiteMeses = 3;
                $limitePrestamo = 5000000;
                break;
        }

        return view('economia.contratarPrestamo');
    }
}
