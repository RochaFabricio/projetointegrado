@extends('layouts.app')

<?php 

$p = new \App\Classes\FormataTudo();

?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cordenação Campus</div>

                <div class="card-body">
                    <table class="table text-center">
                      @if(sizeof($cordenadores) > 0)
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cordenador</th>
                            <th scope="col">Sigla</th>
                            <th scope="col">Campus</th>
                            <th scope="col">Status Até</th>
                            <th scope="col">Editar</th>
                          </tr>
                        </thead>
                        <tbody> 
                      @foreach ($cordenadores as $cordenador)
                      {{--  {{dd($cordenador)}}  --}}
                      <a href="http://">
                        <tr>
                          <th>{{$cordenador->id}}</th>
                          <td>{{$cordenador->user->name}}</td>
                          <td>{{$cordenador->campus->sigla}}</td>
                          <td>{{$cordenador->campus->nome}}</td>
                          <td>
                            {{$cordenador->fim ? $p->formatar($cordenador->fim,'datahora') : 'Atual'}}
                          </td>
                          <td><a href="/coordenacao/{{$cordenador->id}}/detalhes"> >></a></td>
                        </tr>
                      </a>
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

