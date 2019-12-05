@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Auth::user()->tipo == 1 || ($usuario->id === Auth::user()->id))
                  @if (!$usuario->exists)
                  <div class="card-header">Usuário - Novo</div>
                  @else
                  <div class="card-header">{{$usuario->name}} - Editar</div>
                  @endif
                {{-- {{dd(Auth::user()->id)}} --}}
                {{-- {{dd($usuario->id)}} --}}
                <div class="card-body">
                    <form action="/usuarios/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$usuario->id}}" name="id">
                        <div class="form-group">
                          <label for="nome">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" value="{{$usuario->name}}" required placeholder="Nome">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required value="{{$usuario->email}}">
                        </div>
                        <div class="form-group">
                          <label for="prontuario">Prontuario</label>
                          <input type="text" class="form-control" id="prontuario" name="prontuario" placeholder="Prontuario" required maxlength="9" size="9" value="{{$usuario->prontuario}}">
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
                @else
                <div class="card-header">Acesso Negado</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
