<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bugreport;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function bugreports()
    {
        $bugreports = Bugreport::all();
        return view('admin.bugreports', ['bugreports' => $bugreports]);
    }

    public function modificar(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->nombreNuevo;
        $user->nombreCompanyia = $request->nombreNuevoCompanyia;
        $user->save();

        return redirect()->route('admin.index');
    }

    public function borrar($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.index');
    }
}
