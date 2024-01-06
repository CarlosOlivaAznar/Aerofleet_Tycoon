<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return redirect()->route('sede.index');
    }
}
