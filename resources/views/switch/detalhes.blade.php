@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (!$switchs->exists)
              <div class="card-header">Switchs - Novo</div>
              @else
              <div class="card-header">{{$switchs->nome}} - Editar</div>
              @endif

                <div class="card-body">
                    <form action="/switchs/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$switchs->id}}" name="id">
                      <div class="form-group">
                          <label for="sigla">marca</label>
                          <input type="text" class="form-control" id="marca" name="marca" value="{{$switchs->sigla}}" placeholder="marca">
                        </div>
                      <div class="form-group">
                        <label for="sigla">modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{$switchs->sigla}}" placeholder="modelo">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Quantidade de portas</label>
                        <input type="text" class="form-control" id="qtd_portas" name="qtd_portas" value="{{$switchs->sigla}}" placeholder="qtd_portas">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Porta de inicio</label>
                        <input type="text" class="form-control" id="porta_inicio" name="porta_inicio" value="{{$switchs->sigla}}" placeholder="porta_inicio">
                      </div>
                      {{-- <div class="form-group">
                        <label for="sigla">Local de Uso</label>
                        <input type="text" class="form-control" id="local_id" name="local_id" value="{{$switchs->sigla}}" placeholder="local_id">
                      </div> --}}
                      <div class="form-group">
                        <label for="sigla">Local de Uso</label>
                        <select name="coordenador" id="coordenador" class="form-control">
                          <option value=""></option>
                          @foreach ($coordenadores as $coordenador)
                            <option value="{{$coordenador->id}}">{{$coordenador->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="sigla">Rede</label>
                        <select name="coordenador" id="coordenador" class="form-control">
                          <option value=""></option>
                          @foreach ($coordenadores as $coordenador)
                            <option value="{{$coordenador->id}}">{{$coordenador->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      {{-- <div class="form-group">
                        <label for="sigla">Rede</label>
                        <input type="text" class="form-control" id="rede_ip" name="rede_ip" value="{{$switchs->sigla}}" placeholder="rede_ip">
                      </div> --}}
                      <div class="form-group">
                        <label for="nome">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="{{$switchs->nome}}">
                      </div>
                      <div class="form-group">
                        <label for="nome">Senha</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="{{$switchs->nome}}">
                      </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
