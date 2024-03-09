<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $saldo = User::getSaldoString();
        session(['saldo' => $saldo]);

        if(Sede::where('user_id', auth()->id())->first()){
            return view('home.index');
        } else {
            return redirect()->route('home.company');
        }
    }

    public function company()
    {
        return view('home.primerLogin');
    }

    public function submit(Request $request)
    {
        Sede::create([
            'user_id' => auth()->id(),
            'aeropuerto_id' => $request->sedeHid,
            'ingenieros' => 1,
        ]);

        return redirect()->route('home.index');
    }
}
