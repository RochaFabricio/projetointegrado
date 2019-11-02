@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (!$usuario->exists)
                <div class="card-header">Usuário - Novo</div>
                @else
                <div class="card-header">{{$usuario->name}} - Editar</div>
                @endif
  
                <div class="card-body">
                    <form action="/usuarios/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$usuario->id}}" name="id">
                        <div class="form-group">
                          <label for="nome">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" value="{{$usuario->name}}" placeholder="Nome">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{$usuario->email}}">
                        </div>
                        <div class="form-group">
                          <label for="prontuario">Prontuario</label>
                          <input type="text" class="form-control" id="prontuario" name="prontuario" placeholder="Prontuario" value="{{$usuario->prontuario}}">
                        </div>
                        <div class="form-group">
                          <label for="Senha">Senha</label>
                          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="">
                        </div>
                        <div class="form-group">
                          <label for="Senha">Confirmar Senha</label>
                          <input type="password" class="form-control" id="conf_senha" name="conf_senha" placeholder="Confirmar Senha" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
