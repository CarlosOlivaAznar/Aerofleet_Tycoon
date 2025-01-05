<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accion;
use App\Models\Avion;
use App\Models\BeneficiosHistorico;
use App\Models\Flota;
use App\Models\Prestamo;
use App\Models\Sede;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EconomiaController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());

        $deudasCP = 0;
        $deudasLP = 0;
        foreach ($user->prestamo as $prestamo) {
            $fechaFin = Carbon::createFromFormat('Y-m-d', $prestamo->fechaFin);
            $diasRestantes = $fechaFin->diffInDays(Carbon::now());

            if($diasRestantes >= 365){
                $deudasLP += $prestamo->devolver();
            } else {
                $deudasCP += $prestamo->devolver();
            }
        }

        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);
        return view('economia.index', ['user' => $user, 'deudasCP' => $deudasCP, 'deudasLP' => $deudasLP]);
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

        if(count($leasings) > 2) {
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

    /* --------- */
    /* PRESTAMOS */
    /* --------- */

    public function prestamos()
    {
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        $prestamos = Prestamo::where('user_id', auth()->id())->get();

        $prestado = 0;
        foreach ($prestamos as $prestamo){
            $prestado += $prestamo->prestamo;
        }

        if($prestado > 299999999){
            $loops = 3;
        } else {
            $loops = 0;
        }

        return view('economia.prestamo', ['prestamos' => $prestamos, 'loops' => $loops]);
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
                $limitePrestamo = 300000000;
                break;
            default:
                $limiteMeses = 3;
                $limitePrestamo = 5000000;
                break;
        }

        $patrimonio = User::find(auth()->id())->patrimonio();
        $tipoInteres = $this->calcularTipoInteres($patrimonio) * 100;

        return view('economia.contratarPrestamo', ['limiteMeses' => $limiteMeses, 'limitePrestamo' => $limitePrestamo, 'tipoInteres' => $tipoInteres]);
    }

    public function prestamoFinalizado(Request $request)
    {
        $usuario = User::find(auth()->id());
        $prestamo = $request->prestamo;
        $interes = $this->calcularTipoInteres($usuario->patrimonio());

        if($prestamo > 300000000){
            session()->flash('error', trans('economy.loanLimitexceeded'));
            return redirect()->back()->withInput();
        }

        $prestamos = Prestamo::where('user_id', auth()->id())->get();
        $prestado = 0;
        foreach ($prestamos as $prestamo){
            $prestado += $prestamo->prestamo;
        }

        if($prestado + $request->prestamo > 300000000){
            session()->flash('error', trans('economy.totalLoanLimitExcedeed'));
            return redirect()->route('economia.prestamos');
        }

        if(count($prestamos) >= 3){
            session()->flash('error', trans('economy.loanNumberLimit'));
            return redirect()->route('economia.prestamos');
        }

        Prestamo::create([
            'user_id' => auth()->id(),
            'prestamo' => $request->prestamo,
            'interes' => $interes,
            'fechaFin' => now()->addMonths($request->meses),
        ]);

        $usuario->saldo += $request->prestamo;
        $usuario->update();

        session()->flash('exito', trans('economy.loanSuccess'));
        return redirect()->route('economia.prestamos');
    }

    private function calcularTipoInteres($patrimonio)
    {
        if($patrimonio <= 200000000){
            return 0.10;
        } elseif($patrimonio >= 600000000) {
            return 0.05;
        } else {
            return round(0.10 - (($patrimonio - 200000000) / (600000000 - 200000000)) * (0.10 - 0.05), 4);
        }
    }

    public function devolverPrestamo($id)
    {
        $prestamo = Prestamo::find($id);
        $usuario = User::find(auth()->id());
        $devolver = $prestamo->prestamo - $prestamo->devuelto;

        if($usuario->saldo - $devolver < 0){
            session()->flash('error', trans('economy.neBalance'));
            return redirect()->route('economia.prestamos');
        }

        $usuario->saldo -= $devolver;
        $usuario->update();

        $prestamo->delete();

        session()->flash('exito', trans('economy.loanReturned'));
        return redirect()->route('economia.prestamos');
    }


    /* -------- */
    /* ACCIONES */
    /* -------- */

    public function acciones()
    {
        $saldo = User::getSaldoString();
        $sede = Sede::where('user_id', auth()->id())->first();
        session(['saldo' => $saldo]);

        $beneficiosArr = array();
        $fechasArr = array();

        $beneficios = BeneficiosHistorico::where('user_id', auth()->id())->get();
        $acciones = Accion::where('user_id', auth()->id())->get();
        
        foreach ($beneficios as $beneficio) {
            array_push($beneficiosArr, $beneficio->saldo);
            array_push($fechasArr, $beneficio->fecha);
        }

        return view('economia.acciones', ['beneficios' => $beneficiosArr, 'fechas' => $fechasArr, 'acciones' => $acciones, 'sede' => $sede]);
    }

    public function comprarAcciones()
    {
        $sedes = Sede::where('porcentajeVenta', '>', 0)->where('porcentajeVenta', '>', 'porcentajeComprado')->whereColumn('porcentajeVenta', '<>', 'porcentajeComprado')->where('user_id', '!=', auth()->id())->get();

        return view('economia.comprarAcciones', ['sedes' => $sedes]);
    }

    public function venderAccionesPropias(Request $request)
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $user = User::find(auth()->id());

        if($user->patrimonio() < 250000000) {
            session()->flash('error', trans('economy.minimunAssetsError'));
            return redirect()->route('economia.acciones');
        }

        if(($request->porcentajeVenta / 100) + $sede->porcentajeVenta > 0.25){
            session()->flash('error', trans('economy.sellOwnSharesError'));
            return redirect()->route('economia.acciones');
        }

        $sede->porcentajeVenta += $request->porcentajeVenta / 100;
        $sede->update();

        $user->saldo += $user->patrimonio() * ($request->porcentajeVenta / 100);
        $user->update();

        session()->flash('exito', trans('economy.sellOwnSharesSuccess'));
        return redirect()->route('economia.acciones');
    }

    public function recomprarAccionesPropias(Request $request)
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $user = User::find(auth()->id());

        $valorCompra = $user->patrimonio() * ($request->porcentajeCompra / 100 + 0.01);

        if(round($sede->porcentajeVenta - $request->porcentajeCompra / 100, 2) < round($sede->porcentajeComprado, 2)){
            session()->flash('error', trans('economy.buyBackSharesErrorLimit'));
            return redirect()->route('economia.acciones');
        }

        if($user->saldo - $valorCompra < 0){
            session()->flash('error', trans('economy.buyBackSharesErrorneCash'));
            return redirect()->route('economia.acciones');
        }

        $user->saldo -= $valorCompra;
        $user->update();

        $sede->porcentajeVenta -= $request->porcentajeCompra / 100;
        $sede->update();

        session()->flash('exito', trans('economy.buySharesSuccess'));
        return redirect()->route('economia.acciones');
    }

    public function comprarAccionesPost(Request $request)
    {
        $sede = Sede::find($request->sede);
        $user = User::find(auth()->id());

        if(round($sede->porcentajeComprado + ($request->porcentajeAcciones / 100), 2) > $sede->porcentajeVenta){
            session()->flash('error', trans('economy.buySharesErrorPercentaje'));
            return redirect()->route('economia.comprarAcciones');
        }

        if($user->saldo - (($sede->porcentajeVenta - ($sede->porcentajeComprado + $request->porcentajeAcciones)) * $sede->user->patrimonio()) < 0){
            session()->flash('error', trans('economy.buySharesErrorCash'));
            return redirect()->route('economia.comprarAcciones');
        }

        Accion::create([
            'user_id' => auth()->id(),
            'sede_id' => $sede->id,
            'accionesCompradas' => ($request->porcentajeAcciones / 100),
            'valorCompra' => $sede->user->patrimonio(),
            'beneficios' => 0,
        ]);

        $sede->porcentajeComprado += $request->porcentajeAcciones / 100;
        $sede->update();


        session()->flash('exito', trans('economy.buySharesSuccess'));
        return redirect()->route('economia.comprarAcciones');
    }

    public function venderAcciones($id)
    {
        $accion = Accion::find($id);
        $user = User::find(auth()->id());

        if($user->id != $accion->user->id){
            session()->flash('error', trans('economy.sellSharesError'));
            return redirect()->route('economia.acciones');
        }

        $user->saldo += $accion->valorPrecio();

        $accion->sede->porcentajeComprado -= $accion->accionesCompradas;

        $accion->sede->update();
        $user->update();
        $accion->delete();

        session()->flash('exito', trans('economy.sellSharesSuccess'));
        return redirect()->route('economia.acciones');
    }

}
