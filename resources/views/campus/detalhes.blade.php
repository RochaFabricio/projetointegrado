@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (!$campus->exists)
              <div class="card-header">Campus - Novo</div>
              @else
              <div class="card-header">{{$campus->nome}} - Editar</div>
              @endif

                <div class="card-body">
                    <form action="/campus/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$campus->id}}" name="id">
                        <div class="form-group">
                          <label for="sigla">Sigla</label>
                          <input type="text" class="form-control" id="sigla" name="sigla" maxlength="7" size="7" aria-describedby="emailHelp" value="{{$campus->sigla}}" placeholder="Sigla">
                        </div>
                        <div class="form-group">
                          <label for="nome">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$campus->nome}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
