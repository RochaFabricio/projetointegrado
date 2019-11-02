@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informações</div>
                <div class="card-body">
                    <p>Versão Laravel: {{ App::VERSION() }}</p>
                    {{-- {{ dd($versao_db) }} --}}
                    @foreach ($versao_db as $key => $version)

                        @if ($key == 6)
                        <p> Versão do Banco de Dados: {{ $version->Value }}</p>
                        @endif
                        @if ($key == 7)
                        <p> Banco de Dados: {{ $version->Value }}</p>
                        @endif
                    @endforeach
                        <p>Data e Hora Banco: {{ \Carbon\Carbon::now() }}</p>
                        <p>Navegador: {{ $browser->getName() }} - Versão: {{ $browser->getVersion() }}</p>
                        <p>Sistema Operacional: {{ $os->getName() }}</p>
                        <p>Liguagem: {{ ($language->getLanguage() == 'pt') ? 'Português' : $language->getLanguage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

