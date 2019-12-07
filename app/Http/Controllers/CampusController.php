<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Erro;
use App\Events\Erros;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function listar(Request $request){


        $campus = Campus::where('ativo', 1)->get();

        return view('campus.listar')->with([
            "campus" => $campus
        ]);
    }   

    public function detalhes(Campus $campus, Request $request){

        return view('campus.detalhes')->with([
            "campus" => $campus,
        ]);
    }


    public function createOrUpdate(Campus $campus, Request $request){

        try {
            $campus = Campus::firstOrNew(['id' => $request->id]);
            $campus->sigla = $request->sigla;
            $campus->nome = $request->nome;
            $campus->save();

        } catch (\Throwable $th) {
            $erros = new Erro();
            $erros->view = "campus.detalhes";
            $erros->descricao = "Erro ao inserir:".$th;

            event(new Erros($erros));

            return redirect('/campus');
        }
        
        return redirect('campus/'.$campus->id.'/detalhes');
    }
}
