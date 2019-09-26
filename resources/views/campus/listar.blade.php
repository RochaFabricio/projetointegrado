@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Campus</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sigla</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ativo</th>
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
                      </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
