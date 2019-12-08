@extends('layouts.app')
@extends('rede.calc')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redes</div>

                <div class="card-body">
                    <table class="table">
                      @if(sizeof($redes) > 0)
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">IP</th>
                            <th scope="col">Mascara</th>
                            <th scope="col">Editar</th>
                          </tr>
                        </thead>
                        <tbody> 
                        @foreach ($redes as $rede)
                          <tr>
                            <th>{{$rede->id}}</th>
                            <td>{{$rede->ip}}</td>
                            <td>{{$rede->mask}}</td>
                            <td><a href="/rede/{{$rede->id}}/detalhes"> >></a></td>
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
@endsection
