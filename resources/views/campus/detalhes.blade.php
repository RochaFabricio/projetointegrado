@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo</div>

                <div class="card-body">
                    <form action="/campus/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$campus->id}}" name="id">
                        <div class="form-group">
                          <label for="sigla">Sigla</label>
                          <input type="text" class="form-control" id="sigla" name="sigla" aria-describedby="emailHelp" value="{{$campus->sigla}}" placeholder="Sigla">
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
