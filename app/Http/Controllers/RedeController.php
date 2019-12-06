<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\IP;

class RedeController extends Controller
{
    public function index(Request $request){

        // dd($request->ip);
        // $p = new FormataTudo();
        $ip = new IP($request->ip);

        // dd($ip);
                            
        if( $ip->valida_endereco() ) {
            
            $ips = [
                "endereco/rede" => $ip->endereco_completo(),
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
            dd($ips);
        } else {
            echo 'Endereço IPv4 inválido!';
        }
        // dd($request);
    }
}