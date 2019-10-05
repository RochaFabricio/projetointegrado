<?php

namespace App\Http\Controllers;

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
        // dd($request);
        
        $usuario = User::firstOrNew(['id' => $request->id]);
        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->prontuario = $request->prontuario;
        if ((sizeof($request->senha) > 0) && (sizeof($request->conf_senha))) {
            $usuario->password = Hash::make($request->senha);
        }
        $usuario->save();

        return redirect('usuarios/'.$usuario->id.'/detalhes');
    }
}
