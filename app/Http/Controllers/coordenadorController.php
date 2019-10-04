<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class coordenadorController extends Controller
{
    public function listar(Request $request){


        // $campus = Campus::firstOrNew(['id' => $request->id]);
        // $campus->sigla = "BRT";
        // $campus->nome = "IFSP Barretos";
        // $campus->save();

        $coordenador = coordenador::where('ativo', 1)->get();
        // dd($coordenador);
        return view('coordenador.listar')->with([
            "coordenador" => $coordenador
        ]);
    }   

    public function detalhes(coordenador $coordenador, Request $request){

        // $coordenador = coordenador::find($coordenador->id)->get();
        
        return view('coordenador.detalhes')->with([
            "coordenador" => $coordenador,
        ]);
    }


    public function createOrUpdate(coordenador $coordenador, Request $request){

        $coordenador = coordenador::firstOrNew(['id' => $request->id]);
        $coordenador->sigla = $request->sigla;
        $coordenador->nome = $request->nome;
        $coordenador->save();

        return redirect('coordenador/'.$coordenador->id.'/detalhes');
    }
}
