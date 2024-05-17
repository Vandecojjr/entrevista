@extends('layout')

@section('conteudo')
    <div class="container border mt-5 p-2">
        <h5>Cadastrar motorista</h5>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-3" action="{{route('motoristas.store')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col-12">
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
            </div>
            <div class="col-12">
                <label for="cnh" class="form-label">cnh</label>
                <input type="text" class="form-control" id="cnh" name="cnh">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Gravar</button>
                <a role="button" href="/motoristas" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
