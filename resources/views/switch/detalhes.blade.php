@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if ($switchs->exists)
              <div class="card-header">Switchs - Novo</div>
              @else
              <div class="card-header">{{$switchs->modelo}} - Editar</div>
              @endif
                <div class="card-body">
                    <form action="/switch/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$switchs->id}}" name="id">
                      <div class="form-group">
                          <label for="sigla">marca</label>
                          <input type="text" class="form-control" id="marca" name="marca" value="{{$switchs->marca}}" placeholder="marca">
                        </div>
                      <div class="form-group">
                        <label for="sigla">modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{$switchs->modelo}}" placeholder="modelo">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Quantidade de portas</label>
                        <input type="number" class="form-control" id="qtd_portas" name="qtd_portas" value="{{$switchs->sigla}}" placeholder="Quantidade de portas">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Porta de inicio</label>
                        <input type="text" class="form-control" id="porta_inicio" name="porta_inicio" value="{{$switchs->sigla}}" placeholder="Porta de inicio">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Local de Uso</label>
                        <input type="text" class="form-control" id="local_id" name="local_id" value="{{$switchs->sigla}}" placeholder="Local de Uso">
                      </div>
                      <div class="form-group">
                        <label for="sigla">Rede</label>
                        <input type="text" class="form-control" id="rede_ip" name="rede_ip" value="{{$switchs->sigla}}" placeholder="Rede">
                      </div>
                      <div class="form-group">
                        <label for="nome">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="{{$switchs->nome}}">
                      </div>
                      <div class="form-group">
                        <label for="nome">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="{{$switchs->nome}}">
                      </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
