<?php

namespace App\Http\Controllers;

use App\Erro;
use App\Events\Erros;
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

        // dd($switchs);
        return view('switch.detalhes')->with([
            "switchs" => $switchs,
        ]);
    }

    public function createOrUpdate(Request $request)
    {
        try {
            $switchs = Switchs::firstOrNew(['id' => $request->id]);
            $switchs->marca = $request->marca;
            $switchs->modelo = $request->modelo;
            $switchs->qtd_portas = $request->qtd_portas;
            $switchs->porta_inicio = $request->porta_inicio;
            $switchs->local_id = $request->local_id;
            $switchs->rede_ip = $request->rede_ip;
            $switchs->usuario = $request->usuario;
            $switchs->senha = $request->senha;
            $switchs->save();
        } catch (\Throwable $th) {
            $erros = new Erro();
            $erros->view = "Switch.detalhes";
            $erros->descricao = "Erro ao inserir:".$th;

            event(new Erros($erros));

            return redirect('/switch');
        }
        // dd($switchs);
        return redirect('switch/'.$switchs->id.'/detalhes');

    }
}
