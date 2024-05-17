@extends('layout')

@section('conteudo')
    <div class="p-2">
        <a class="btn  btn-success" href="/cadastrar-motorista" role="button">Add + </a>
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
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>CNH</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motoristas as $motorista)
                {{-- modal para confirmar exclusão --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar motorista</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         Deletar?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form action="/motoristas/{{ $motorista->id }}" method="POST">
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
                        <td>{{ $motorista->nome }}</td>
                        <td>{{ $motorista->data_nascimento }}</td>
                        <td>{{ $motorista->cnh }}</td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Deletar
                              </button>
                            <a class="btn btn-primary mx-1" href="/motoristas/{{ $motorista->id }}" role="button">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
