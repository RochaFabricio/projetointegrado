<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Coordenacao;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Classes\FormataTudo;

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

        $coordenacao->load('user')->load('campus');
        $campus = Campus::get();
        $coordenadores = User::get();
        
        return view('coordenacao.detalhes')->with([
            "coordenacao" => $coordenacao,
            "campus" => $campus,
            "coordenadores" => $coordenadores,
        ]);
    }

    public function createOrUpdate(Coordenacao $coordenacao, Request $request){
        // dd($request);
        
        $p = new FormataTudo();

        $coordenacao = Coordenacao::firstOrNew(['id' => $request->id]);
        $coordenacao->campus_id = $request->campus;
        $coordenacao->user_id = $request->coordenador; 

        if ($request->fim) {
            $coordenacao->fim =  $p->formatar($request->fim, 'datahora', 'banco');
        }
        
        $coordenacao->save();

        return redirect('coordenacao/'.$coordenacao->id.'/detalhes');
    }

}
