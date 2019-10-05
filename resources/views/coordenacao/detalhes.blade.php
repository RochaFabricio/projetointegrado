@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo</div>
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
                          <input type="text" class="form-control" id="fim" name="fim" aria-describedby="emailHelp" value="{{$coordenacao->fim}}" placeholder="Este é o coordenador atual">
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