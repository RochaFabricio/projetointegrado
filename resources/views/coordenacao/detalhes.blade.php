@extends('layouts.app')

<?php 

$p = new \App\Classes\FormataTudo();

?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (!$coordenacao->exists)
              <div class="card-header">Coordenador - Novo</div>
              @else
              <div class="card-header">{{$coordenacao->user->name}} / {{$coordenacao->campus->nome}} - Editar</div>
              @endif
                <div class="card-body">
                    <form action="/coordenacao/novo" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="sigla">Campus</label>
                        <select name="campus" id="campus" class="form-control">
                          <option value=""></option>
                          @foreach ($campus as $campus)
                            <option value="{{$campus->id}}">{{$campus->nome}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="sigla">Coordenador</label>
                          <select name="coordenador" id="coordenador" class="form-control">
                            <option value=""></option>
                            @foreach ($coordenadores as $coordenador)
                              <option value="{{$coordenador->id}}">{{$coordenador->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      <input type="hidden" value="{{$coordenacao->id}}" name="id">
                        <div class="form-group">
                          <label for="sigla">Fim</label>
                          {{-- {{dd($p->formatar($coordenacao->fim, 'datahora'))}} --}}
                          <input type="datetime" class="form-control" id="fim" name="fim" value="{{$p->formatar($coordenacao->fim, 'datahora')}}" placeholder="Ex: dd/mm/aaaa 00:00">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    {{--  {{dd($campus->id)}}  --}}
</div>
@endsection

@section('footerScripts')

<script>
  $( document ).ready(function() {
    $('#campus').val('{{$coordenacao->campus_id}}');
    $('#coordenador').val('{{$coordenacao->user_id}}');

  });
</script>

@endsection