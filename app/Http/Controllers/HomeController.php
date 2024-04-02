<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aeropuerto;
use App\Models\BeneficiosHistorico;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        // Si existe la sede del usuario significa que no es la primera vez entra, en cambio si no existe significa que no
        // a terminado de configurar su cuenta
        if(Sede::where('user_id', auth()->id())->first()){
            $user = User::find(auth()->id());
            $beneficiosArr = array();
            $fechasArr = array();

            $beneficios = BeneficiosHistorico::where('user_id', auth()->id())->get();

            
            foreach ($beneficios as $beneficio) {
                array_push($beneficiosArr, $beneficio->saldo);
                array_push($fechasArr, $beneficio->fecha);
            }

            // Variables de sesion
            $infoAviones = Session::get('infoAviones', []);

            // Creamos la variable de sesion nueva para mostrar los mensajes importantes para el usuario
            $mensajeVuelos = Session::get('mensajeVuelos', []);

            //dd($infoAviones, $mensajeVuelos);

            return view('home.index', ['user' => $user, 'beneficios' => $beneficiosArr, 'fechas' => $fechasArr, 'infoAviones' => $infoAviones, 'mensajeVuelos' => $mensajeVuelos]);
        } else {
            return redirect()->route('home.company');
        }
    }

    public function company()
    {
        if(Sede::where('user_id', auth()->id())->first()){
            return redirect()->route('home.index');
        } else {
            $aeropuertos = Aeropuerto::all();

            return view('home.primerLogin', ['aeropuertos' => $aeropuertos]);
        }
    }

    public function submit(Request $request)
    {
        Sede::create([
            'user_id' => auth()->id(),
            'aeropuerto_id' => $request->sedeHid,
            'ingenieros' => 1,
        ]);

        $user = User::find(auth()->id());
        $user->nombreCompanyia = $request->nombreCompanyia;
        $user->save();

        return redirect()->route('home.index');
    }
}
