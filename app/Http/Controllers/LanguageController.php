<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
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

        $this->manualChange();

        return redirect()->back();
    }

    public function changeLink($lang)
    {
        if(array_key_exists($lang, Config::get('app.languages'))){
            Session::put('locale', $lang);
        }

        $this->manualChange();

        return redirect()->back();
    }

    /**
     * Si usuario ha cambiado manualmente el idioma creamos una variable de sesion
     * para que en el caso de que entre en el landing no cambie el idioma automaticamente
     */
    public function manualChange()
    {
        Cookie::queue('manualChange', true, 200000);
    }
}
