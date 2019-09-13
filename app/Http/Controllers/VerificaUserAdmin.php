<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VerificaUserAdmin extends Controller
{
    public function verificaLogin(){
        $users = User::get();

        if (!sizeof($users) > 0) {
            $existe = 1;
        } else {
            $existe = 0;
        }
        
        return view('auth.login')->with([
            'existe' => $existe
        ]);
    }
}
