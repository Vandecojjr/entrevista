@extends('layout')

@section('conteudo')
    <div class="p-2">
        <a class="btn  btn-success" href="/cadastrar-veiculo" role="button">Add + </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class=" table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Data de aquisição</th>
                    <th>Km rodados</th>
                    <th>Renavan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($veiculos as $veiculo)

                {{-- modal para confirmar exclusão --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar veículo</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         Deletar?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form action="/veiculos/{{ $veiculo->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    {{--  --}}

                <tr>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->ano}}</td>
                    <td>{{$veiculo->data_aquisicao}}</td>
                    <td>{{$veiculo->kms_rodados}}</td>
                    <td>{{$veiculo->renavam}}</td>
                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Deletar
                      </button>
                        <a class="btn btn-primary mx-1" href="/veiculos/{{ $veiculo->id }}" role="button">Editar</a>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
