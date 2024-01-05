<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Espacio;
use App\Models\Aeropuerto;
use App\Models\User;

class EspaciosController extends Controller
{
    public function index()
    {
        $espacios = Espacio::where('user_id', auth()->id())->get();
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);
        
        return view('espacios.index', ['espacios' => $espacios]);
    }

    public function aeropuertos()
    {
        $aeropuertos = Aeropuerto::all();
        return view('espacios.comprarEspacios', ['aeropuertos' => $aeropuertos]);
    }

    public function comprar(Request $request)
    {
        $aeropuerto = Aeropuerto::where('icao', $request->aeropuerto)->first();
        $user = User::find(auth()->id());

        if($user->saldo - $aeropuerto->costeOperacional1 * 1000 >= 0){

            Espacio::create([
                'aeropuerto_id' => $aeropuerto->id,
                'user_id' => auth()->id(),
                'numeroDeEspacios' => $request->espacios,
            ]);

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - $aeropuerto->costeOperacional1 * 1000;
            $user->update();

            // Mostramos mensaje de exito
            session()->flash('exito', 'El espacio ha sido comprado correctamente');
        } else {
            session()->flash('error', 'No tiene sufiente saldo');
        }

        return redirect()->route('espacios.index');
    }
}
