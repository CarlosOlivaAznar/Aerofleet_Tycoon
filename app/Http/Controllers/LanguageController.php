<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->language;
        if(array_key_exists($lang, Config::get('app.languages'))){
            Session::put('locale', $lang);

            $usuario = User::find(auth()->id());
            $usuario->preferred_language = $lang;
            $usuario->save();
        }

        return redirect()->back();
    }

    public function changeLink($lang)
    {
        if(array_key_exists($lang, Config::get('app.languages'))){
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}
