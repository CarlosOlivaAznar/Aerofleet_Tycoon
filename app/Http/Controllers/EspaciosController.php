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

        if($user->saldo - $aeropuerto->costeOperacional * 1000 >= 0){
            if($espacio = Espacio::where('aeropuerto_id', $aeropuerto->id)->first()){
                $espacio->numeroDeEspacios += $request->espacios;
                $espacio->update();
            } else {
                Espacio::create([
                    'aeropuerto_id' => $aeropuerto->id,
                    'user_id' => auth()->id(),
                    'numeroDeEspacios' => $request->espacios,
                ]);
            }

            // Actualizamos el saldo del usuario
            $user->saldo = $user->saldo - $aeropuerto->costeOperacional * 1000;
            $user->update();

            // Mostramos mensaje de exito
            session()->flash('exito', 'El espacio ha sido comprado correctamente');
        } else {
            session()->flash('error', 'No tiene sufiente saldo');
        }

        return redirect()->route('espacios.index');
    }

    public function vender($id)
    {
        $espacio = Espacio::where('id', $id)->first();
        $user = User::find(auth()->id());
        
        if($espacio->user_id === auth()->id()){
            if($espacio->numeroDeEspacios > 1){
                $espacio->numeroDeEspacios--;
                $espacio->update();

                $user->saldo = $user->saldo + $espacio->aeropuerto->costeOperacional * 1000;
                $user->update();

                session()->flash('exito', 'Se ha vendido un espacio de: ' . $espacio->aeropuerto->nombre);
            } elseif($espacio->numeroDeEspacios === 1) {
                $espacio->delete();

                $user->saldo = $user->saldo + $espacio->aeropuerto->costeOperacional * 1000;
                $user->update();

                session()->flash('exito', 'Se han vendido todos los espacios de: ' . $espacio->aeropuerto->nombre);
            } else {
                session()->flash('error', 'Error al vender el espacio de ' . $espacio->aeropuerto->nombre);
            }
        } else {
            session()->flash('error', 'Error al autentificar el usuario propietario del espacio');
        }

        return redirect()->route('espacios.index');
    }
}
