<?php

namespace App\Http\Controllers;

use App\Erro;
use App\Events\Erros;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function listar(Request $request){
        $usuarios = User::get();

        // dd($cordenadores);
        return view('usuarios.listar')->with([
            "usuarios" => $usuarios
        ]);
    }   

    public function detalhes(User $usuario, Request $request){

        return view('usuarios.detalhes')->with([
            "usuario" => $usuario,
        ]);
    }

    public function createOrUpdate(User $usuario, Request $request){
        
        try {
            $usuario = User::firstOrNew(['id' => $request->id]);
            $usuario->name = $request->nome;
            $usuario->email = $request->email;
            $usuario->prontuario = $request->prontuario;
            if($request->senha && $request->conf_senha){
                $usuario->password = Hash::make($request->senha);
            }
            $usuario->tipo = $request->tipo_user;
            $usuario->save();
        } catch (\Throwable $th) {
            $erros = new Erro();
            $erros->view = "usuario.detalhes";
            $erros->descricao = "Erro ao inserir:".$th;

            event(new Erros($erros));

            return redirect('/usuarios');

        }
        
        return redirect('usuarios/'.$usuario->id.'/detalhes');
    }
}
