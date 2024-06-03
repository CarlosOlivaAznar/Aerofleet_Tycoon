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
}
