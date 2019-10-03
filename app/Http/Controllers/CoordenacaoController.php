<?php

namespace App\Http\Controllers;

use App\Coordenacao;
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

}
