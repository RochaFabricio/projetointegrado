@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">
                    <table class="table text-center">
                        @if(sizeof($usuarios) > 0)
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">E-mail</th>
                              <th scope="col">Prontuario</th>
                              <th scope="col">Editar</th>
                            </tr>
                          </thead>
                          <tbody> 
                          @foreach ($usuarios as $usuario)
                            <tr>
                              <td>{{$usuario->id}}</td>
                              <td>{{$usuario->name}}</td>
                              <td>{{$usuario->email}}</td>
                              <td>
                                {{$usuario->prontuario}}
                              </td>
                              <td><a href="/usuarios/{{$usuario->id}}/detalhes"> >></a></td>
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
