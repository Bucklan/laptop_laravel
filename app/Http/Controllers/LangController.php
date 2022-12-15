<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switchLang(Request $request, $lang){ //lang=kz ru en
        if(array_key_exists($lang, config('app.languages'))){
            //массив ішінде осындай кілт барма ізд lang barma
            $request->session()->put('mylocale', $lang);
        }
        return back();
    }
}
//controller sessia ishinde tildi jzgerty
