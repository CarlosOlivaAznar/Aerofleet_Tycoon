<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hangar;
use Illuminate\Http\Request;

use App\Models\Sede;
use App\Models\User;

class SedeController extends Controller
{
    public function index()
    {
        $sede = Sede::where('user_id', auth()->id())->first();

        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        return view('sede.index', ['sede' => $sede]);
    }

    public function comprarHangar()
    {
        $user = User::find(auth()->id());
        $sede = Sede::where('user_id', auth()->id())->first();

        if($user->saldo - $sede->aeropuerto->costeOperacional1 * 525 >= 0){
            Hangar::create([
                'sede_id' => $sede->id,
                'espacios' => 1,
            ]);

            $user->saldo -= $sede->aeropuerto->costeOperacional1 * 525;
            $user->update();

            session()->flash('exito', 'Hangar comprado correctamente');
        } else {
            session()->flash('error', 'Saldo insuficiente');
        }

        return redirect()->route('sede.index');
    }
}
