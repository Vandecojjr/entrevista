@extends('layout')

@section('conteudo')
    <div class="p-2">
        <a class="btn  btn-success" href="/cadastrar-viagem" role="button">Add + </a>
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
                    <th>Modelo do veículo</th>
                    <th>Renavan do veículo</th>
                    <th>Km inical</th>
                    <th>Km final</th>
                    <th>Nome do motorista</th>
                    <th>CNH do motorista</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viagens as $viagem)

                {{-- modal para confirmar exclusão --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar viagem</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         Deletar?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form action="/viagens/{{ $viagem->id }}" method="POST">
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
                        <td>{{ $viagem->veiculo->modelo }}</td>
                        <td>{{ $viagem->veiculo->renavam }}</td>
                        <td>{{ $viagem->km_i_viagem }}</td>
                        <td>{{ $viagem->km_f_viagem }}</td>
                        <td>{{ $viagem->motorista->nome }}</td>
                        <td>{{ $viagem->motorista->cnh }}</td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Deletar
                              </button>
                            @if ($viagem->km_f_viagem === null)
                                <a class="btn  btn-success mx-1" href="/viagens/{{ $viagem->id }}"
                                    role="button">finalizar</a>
                            @else
                                <a class="btn btn-primary mx-1" href="/viagens/{{ $viagem->id }}"
                                    role="button">Editar</a>
                            @endif


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
