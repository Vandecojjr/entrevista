@extends('layout')

@section('conteudo')
    <div class="container border mt-5 p-2">
        <h5>Cadastrar viagem</h5>
        @if ($veiculos->isNotEmpty() and $motoristas->isNotEmpty())
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row g-3" action="/viagens" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="veiculo" class="form-label">Veículo</label>
                    <select class="form-select" aria-label="Default select example" id="veiculo" name="id_veiculo">
                        <option selected value="{{null}}">Escolha um veiculo</option>
                        @foreach ($veiculos as $veiculo)
                            <option value="{{ $veiculo->id }}">{{ $veiculo->modelo }} ({{ $veiculo->renavam }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="motorista" class="form-label">Motorista</label>
                    <select class="form-select" aria-label="Default select example" id="motorista" name="id_motorista">
                        <option selected value="{{null}}">Escolha um motorista</option>
                        @foreach ($motoristas as $motorista)
                            <option value="{{ $motorista->id }}">{{ $motorista->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="km_i_viagem" class="form-label">Km inicial</label>
                    <input type="number" class="form-control" id="km_i_viagem" name="km_i_viagem">
                </div>
                <div class="col-md-6">
                    <label for="km_f_viagem" class="form-label">Km final</label>
                    <input type="number" class="form-control" id="km_f_viagem" name="km_f_viagem" disabled="false">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                    <a role="button" href="/viagens" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        @else
            <div class="alert alert-danger" role="alert">
                <h4>Cadastre pelo menos 1 motorista e 1 veículo</h4>
            </div>
        @endif
    </div>
@endsection
