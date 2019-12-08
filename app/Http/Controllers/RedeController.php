<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\IP;
use App\Ips;
use App\Rede;

class RedeController extends Controller
{
    public function index(Request $request){

        // dd($request->ip);
        // $p = new FormataTudo();
        $ip = new IP($request->ip);

        // dd($ip);
                            
        if( $ip->valida_endereco() ) {
            
            // try {
            //     $rede = new Rede();
            //     $rede->ip = $ip->endereco();
            //     $rede->mask = $ip->mascara();
            //     $rede->save();

            //     // $validos = new Ips();
            //     // $validos->
            // } catch (\Throwable $th) {
            //     throw $th;
            // }
            $rede = [
                "endereco_rede" => $ip->endereco_completo(),
                "endereco" => $ip->endereco(),
                "prefixo" => $ip->cidr(),
                "mascara" => $ip->mascara(),
                "ip_rede" => $ip->rede().'/'.$ip->cidr(),
                "broadcast" => $ip->broadcast(),
                "primeiro_host" => $ip->primeiro_ip(),
                "ultimo_host" => $ip->ultimo_ip(),
                "total_ips" => $ip->total_ips(),
                "total_validos" => $ip->ips_rede(),
            ];
            $erro = 0;
            
        } else {
            $erro = 1;
        }
        return view('rede.preview')->with(['rede' => $rede, 'erro' => $erro]);
    }
}
