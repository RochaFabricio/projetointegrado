@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campus</div>

                <div class="card-body">
                    <table class="table">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
