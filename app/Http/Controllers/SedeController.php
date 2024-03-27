<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flota;
use App\Models\Hangar;
use Illuminate\Http\Request;

use App\Models\Sede;
use App\Models\User;

class SedeController extends Controller
{
    public function index()
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $flotaMantenimiento = Flota::where('user_id', auth()->id())->where('estado', 2)->get();

        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('sede.index', ['sede' => $sede, 'flotaMantenimiento' => $flotaMantenimiento]);
    }

    public function comprarHangar()
    {
        $user = User::find(auth()->id());
        $sede = Sede::where('user_id', auth()->id())->first();

        if($user->saldo - $sede->aeropuerto->costeOperacional * 525 >= 0){
            Hangar::create([
                'sede_id' => $sede->id,
                'espacios' => 1,
            ]);

            $user->saldo -= $sede->aeropuerto->costeOperacional * 525;
            $user->update();

            session()->flash('exito', 'Hangar comprado correctamente');
        } else {
            session()->flash('error', 'Saldo insuficiente');
        }

        return redirect()->route('sede.index');
    }

    public function contratarIngenieros()
    {
        $sede = Sede::where('user_id', auth()->id())->first();
        $sede->ingenieros++;
        $sede->update();

        session()->flash('exito', 'Ingeniero contratado correctamente');
        return redirect()->route('sede.index');
    }

    public function ampliarHangar($id)
    {
        $hangar = Hangar::where('id', $id)->first();
        $user = User::find(auth()->id());
        if($hangar->espacios === 6){
            session()->flash('error', 'Limite maximo de espacios alcanzado');
        } elseif($user->saldo - 250000 >= 0) {
            $hangar->espacios++;
            $hangar->update();

            $user->saldo -= 250000;
            $user->update();

            session()->flash('exito', 'Hangar ampliado correctamente');
        } else {
            session()->flash('error', 'Saldo insuficiente');
        }

        return redirect()->route('sede.index');
    }

    public function quitarMantenimiento($id)
    {
        $avion = Flota::where('user_id', auth()->id())->where('id', $id)->first();
        
        $avion->estado = 0;
        $avion->update();

        return redirect()->route('sede.index');
    }
}
