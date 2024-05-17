@extends('layout')

@section('conteudo')
    <div class="container border mt-5 p-2">
        <h5>Cadastrar veículo</h5>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-3" action="/veiculos" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>
            <div class="col-md-6">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano">
            </div>
            <div class="col-12">
                <label for="data_aquisicao" class="form-label">Data de aquisição</label>
                <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao">
            </div>
            <div class="col-12">
                <label for="kms_rodados" class="form-label">kilômetros rodados</label>
                <input type="number" class="form-control" id="kms_rodados" name="kms_rodados">
            </div>
            <div class="col-md-6">
                <label for="renavam" class="form-label">Renavam</label>
                <input type="number" class="form-control" id="renavam" name="renavam">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Gravar</button>
                <a role="button" href="/veiculos" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
