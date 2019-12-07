@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pré-Visualização</div>

                <div class="card-body">
                    @if($erro == 0)
                        
                    @else
                    <p>Endereço de IP inválido</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
