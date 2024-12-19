<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EconomiaController extends Controller
{
    public function index()
    {
        return view('economia.index');
    }

    public function leasing()
    {
        return view('economia.leasing');
    }
}
