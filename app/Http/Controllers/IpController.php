<?php

namespace App\Http\Controllers;
use app\Classes\class_calc_ipv4;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IpController extends Controller
{
    public function index(Request $rede)
    {
        //tem que adapta para o laravel.
        $ip = new calc_ipv4($rede->ip);
    
        if( $ip->valida_endereco() ) {
            echo '<h2>Configurações de rede para <span style="color: green;">' . $rede->ip . '</span> </h2>';
            echo "<pre class='resultado'>";
        
            echo "<b>Endereço/Rede: </b>" . $ip->endereco_completo() . '<br>';
            echo "<b>Endereço: </b>" . $ip->endereco() . '<br>';
            echo "<b>Prefixo CIDR: </b>/" . $ip->cidr() . '<br>';
            echo "<b>Máscara de sub-rede: </b>" . $ip->mascara() . '<br>';
            echo "<b>IP da Rede: </b>" . $ip->rede() . '/' . $ip->cidr() . '<br>';
            echo "<b>Broadcast da Rede: </b>" . $ip->broadcast() . '<br>';
            echo "<b>Primeiro Host: </b>" . $ip->primeiro_ip() . '<br>';
            echo "<b>Último Host: </b>" . $ip->ultimo_ip() . '<br>';
            echo "<b>Total de IPs:  </b>" . $ip->total_ips() . '<br>';
            echo "<b>Hosts: </b>" . $ip->ips_rede();
            echo "</pre>";
        } else {
            echo 'Endereço IPv4 inválido!';
        }
    }
}
