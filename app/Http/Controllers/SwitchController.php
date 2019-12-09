<?php

namespace App\Http\Controllers;

use App\Switchs;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function listar()
    {
        $switchs = Switchs::get();

        return view('switch.listar')->with(['switchs' => $switchs]);
    }

    public function detalhes(Switchs $switchs, Request $request){

        return view('switch.detalhes')->with([
            "switchs" => $switchs,
        ]);
    }

    public function createOrNew(Request $request)
    {
        
    }
}
