@extends('layouts.app')
@extends('rede.calc')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redes</div>

                <div class="card-body">
                        <section>
                                {{-- <h1>Calcular máscara de sub-rede IPv4</h1> --}}
                            
                            <form method="POST" action="/rede">
                                @csrf
                                <b style="color: green">IP/CIDR</b> <small>(Ex.: 192.168.0.1/24)</small> <br> 
                                <input style="border:1px solid green; line-height: 2; padding: 0 5px; width: 200px;" type="text" name="ip" value="<?php echo @$_POST['ip'];?>">
                                <input style="border:1px solid green; background: green; color: #fff; font-weight: 700; cursor: pointer; line-height: 2; padding: 0 5px;" type="submit" value="Calcular">
                            </form>
                           
                        <?php
                        if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
                            // $ip = new calc_ipv4( $_POST['ip'] );
                            
                            // if( $ip->valida_endereco() ) {
                            //     echo '<h2>Configurações de rede para <span style="color: green;">' . $_POST['ip'] . '</span> </h2>';
                            //     echo "<pre class='resultado'>";
                                
                            //     echo "<b>Endereço/Rede: </b>" . $ip->endereco_completo() . '<br>';
                            //     echo "<b>Endereço: </b>" . $ip->endereco() . '<br>';
                            //     echo "<b>Prefixo CIDR: </b>/" . $ip->cidr() . '<br>';
                            //     echo "<b>Máscara de sub-rede: </b>" . $ip->mascara() . '<br>';
                            //     echo "<b>IP da Rede: </b>" . $ip->rede() . '/' . $ip->cidr() . '<br>';
                            //     echo "<b>Broadcast da Rede: </b>" . $ip->broadcast() . '<br>';
                            //     echo "<b>Primeiro Host: </b>" . $ip->primeiro_ip() . '<br>';
                            //     echo "<b>Último Host: </b>" . $ip->ultimo_ip() . '<br>';
                            //     echo "<b>Total de IPs:  </b>" . $ip->total_ips() . '<br>';
                            //     echo "<b>Hosts: </b>" . $ip->ips_rede();
                            //     echo "</pre>";
                            // } else {
                            //     echo 'Endereço IPv4 inválido!';
                            // }
                        }
                        ?>
                           </section>
                    {{-- <table class="table">
                      @if(sizeof($campus) > 0)
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sigla</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Editar</th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach ($campus as $campus)
                          <tr>
                            <th>{{$campus->id}}</th>
                            <td>{{$campus->sigla}}</td>
                            <td>{{$campus->nome}}</td>
                            <td>
                              @if ($campus->ativo == 1)
                                Ativo
                              @else
                                Desativado
                              @endif
                            </td>
                            <td><a href="/campus/{{$campus->id}}/detalhes"> >></a></td>
                          </tr>
                        @endforeach
                        </tbody>
                        @else
                        <p>Nenhum cadastro existente.</p>
                        @endif
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
