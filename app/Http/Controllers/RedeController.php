<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\IP;
use App\Ips;
use App\Rede;

class RedeController extends Controller
{
    public function index(){

        $redes = Rede::get();

        return view('rede.listar')->with(['redes' => $redes]);
    }

    public function novo(){

        $redes = Rede::get();

        return view('rede.novo');
    }

    public function detalhes(Rede $rede, Request $request){

        return view('rede.detalhes')->with(['rede' => $rede]);

    }

    public function createOrUpdate(Request $request){

        $ip = new IP($request->ip);

        if( $ip->valida_endereco() ) {
            
            try {
                $rede = new Rede();
                $rede->ip = $ip->endereco();
                $rede->mask = $ip->mascara();
                $rede->save();

            } catch (\Throwable $th) {
                throw $th;
            }

            $erro = 0;
            
        } else {
            $erro = 1;
        }

        return redirect('/rede');

    }
}
