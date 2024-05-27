@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Serviços
        @can('create-servico')
        <a href="{{ route('admin.servico.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col" style="text-align: center;" class="d-none d-sm-table-cell">Descrição</th>
                        <th scope="col" style="text-align: center;" class="d-none d-sm-table-cell">Imagem</th>
                        <th scope="col" style="text-align: center;">Status</th>
                        <th scope="col" style="text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicos as $servico)
                    <tr>
                        <td class="align-middle">{{ $servico->titulo }}</td>
                        <td class="align-middle d-none d-sm-table-cell" style="text-align: center;">{{ $servico->descricao }}</td>
                        <td class="align-middle d-none d-sm-table-cell" style="text-align: center;">
                            <i class=" {{ $servico->imagem }}"></i>
                            <!-- <img src="{{ $servico->imagem }}" width="100px"> -->
                        </td>
                        <td class="align-middle" style="text-align: center;">
                            @if ($servico->status == 'ativo')
                            <div class="badge rounded-pill text-bg-success">{{ $servico->status }}</div>
                            @else
                            <div class="badge rounded-pill text-bg-danger">{{ $servico->status }}</div>
                            @endif
                        </td>
                        <td class="align-middle" style="text-align: center;">
                            <a href="{{ route('admin.servico.show', ['servico' => $servico->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                            @can('edit-servico')
                            <a href="{{ route('admin.servico.edit', ['servico' => $servico->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection