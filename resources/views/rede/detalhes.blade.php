@extends('layouts.app')
@extends('rede.calc')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redes</div>

                <div class="card-body">
                    <form action="/rede/novo" method="POST">
                      @csrf
                      <input type="hidden" value="{{$rede->id}}" name="id">
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="sigla">ID</label>
                            <input type="text" class="form-control" id="id" name="id" maxlength="7" size="7" aria-describedby="ID" value="{{$rede->id}}" placeholder="ID">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="nome">IP</label>
                            <input type="text" class="form-control" id="ip" name="ip" placeholder="Nome" value="{{$rede->ip}}">
                          </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nome">Mascara</label>
                                <input type="text" class="form-control" id="mask" name="mask" placeholder="Mascara" value="{{$rede->mask}}">
                              </div>
                        </div>
                      </div>
                        <a href="/rede" class="btn btn-info text-white">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
