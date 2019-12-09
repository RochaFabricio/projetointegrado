@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Switchs</div>
                    <div class="card-body">
                        <table class="table">
                            @if(sizeof($switchs) > 0)
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">IP</th>
                                <th scope="col">Mascara</th>
                                <th scope="col">Editar</th>
                            </tr>
                            </thead>
                            <tbody> 
                            @foreach ($switchs as $switch)
                            <tr>
                                <th>{{$switch->marca}}</th>
                                <td>{{$switch->modelo}}</td>
                                <td>{{$switch->qtd_portas}}</td>
                                <td>{{$switch->porta_inicio}}</td>
                                <td>{{$switch->local_id}}</td>
                                <td>{{$switch->rede_ip}}</td>
                                <td>{{$switch->usuario}}</td>
                                <td>{{$switch->senha}}</td>
                                <td><a href="/switch/{{$switch->id}}/detalhes"> >></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            @else
                            <p>Nenhum cadastro existente.</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

