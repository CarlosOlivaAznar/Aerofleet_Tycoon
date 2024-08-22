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
        $aeropuertosMapa = array();

        foreach ($aeropuertos as $aeropuerto) {
            array_push($aeropuertosMapa, [
                $aeropuerto->latitud,
                $aeropuerto->longitud,
                $aeropuerto->icao . ", " .$aeropuerto->nombre,
            ]);
        }

        return view('espacios.comprarEspacios', ['aeropuertos' => $aeropuertos]);
    }

    public function comprar(Request $request)
    {
        $aeropuerto = Aeropuerto::where('icao', $request->aeropuerto)->first();
        $user = User::find(auth()->id());
        
        if(isset($aeropuerto->espacio[0]) && $aeropuerto->espacio[0]->espaciosOcupadosTotales() + $request->espacios > $aeropuerto->espaciosTotales){
            session()->flash('error', trans('slots.noSlotsAva'));
            return redirect()->route('espacios.index');
        } elseif($aeropuerto->espaciosTotales < $request->espacios){
            session()->flash('error', trans('slots.maxSlotsAva'));
            return redirect()->route('espacios.index');
        }

        if($user->saldo - $aeropuerto->precioEspacio() * $request->espacios >= 0){
            if($espacio = Espacio::where('aeropuerto_id', $aeropuerto->id)->where('user_id', auth()->id())->first()){
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
            $user->saldo = $user->saldo - $aeropuerto->precioEspacio() * $request->espacios;
            $user->update();

            // Mostramos mensaje de exito
            session()->flash('exito', trans('slots.slotBuySuccess'));
        } else {
            session()->flash('error', trans('slots.neCash'));
        }

        return redirect()->route('espacios.index');
    }

    public function vender($id)
    {
        $espacio = Espacio::where('id', $id)->first();
        $user = User::find(auth()->id());

        if($espacio->espaciosDisponibles() <= 0){
            session()->flash('error', trans('slots.sellErrNeSlots'));
            return redirect()->route('espacios.index'); 
        }
        
        if($espacio->user_id === auth()->id()){
            if($espacio->numeroDeEspacios > 1){
                $espacio->numeroDeEspacios--;
                $espacio->update();

                $user->saldo = $user->saldo + $espacio->aeropuerto->precioEspacio();
                $user->update();

                session()->flash('exito', trans('slots.sellSuccess') . ' ' . $espacio->aeropuerto->nombre);
            } elseif($espacio->numeroDeEspacios === 1) {
                $espacio->delete();

                $user->saldo = $user->saldo + $espacio->aeropuerto->precioEspacio();
                $user->update();

                session()->flash('exito', trans('slots.allSellSuccess') . ' ' . $espacio->aeropuerto->nombre);
            } else {
                session()->flash('error', trans('slots.errSell') . ' ' . $espacio->aeropuerto->nombre);
            }
        } else {
            session()->flash('error', trans('slots.errUser'));
        }

        return redirect()->route('espacios.index');
    }
}
