<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Coordenacao;
use App\User;
use Illuminate\Http\Request;

class CoordenacaoController extends Controller
{
    public function listar(Request $request){
        // $campus = Campus::firstOrNew(['id' => $request->id]);
        // $campus->sigla = "BRT";
        // $campus->nome = "IFSP Barretos";
        // $campus->save();

        $cordenadores = Coordenacao::with('campus')->with('user')->get();

        // dd($cordenadores);
        return view('coordenacao.listar')->with([
            "cordenadores" => $cordenadores
        ]);
    }   

    public function detalhes(Coordenacao $coordenacao, Request $request){

        $campus = Campus::get();
        $coordenadores = User::get();
        
        return view('coordenacao.detalhes')->with([
            "coordenacao" => $coordenacao,
            "campus" => $campus,
            "coordenadores" => $coordenadores,
        ]);
    }

}
