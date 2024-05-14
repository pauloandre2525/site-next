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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicos as $servico)
                <tr>
                    <th scope="row">{{ $servico->id }}</th>
                    <td>{{ $servico->titulo }}</td>
                    <td>{{ $servico->descricao }}</td>
                    <td>
                        <i class="{{ $servico->imagem }}"></i>
                        <!-- <img src="{{ $servico->imagem }}" width="100px"> -->
                    </td>
                    <td style="text-align: center;">
                        @if ($servico->status == 'ativo')
                        <div class="badge rounded-pill text-bg-success">{{ $servico->status }}</div>
                        @else
                        <div class="badge rounded-pill text-bg-danger">{{ $servico->status }}</div>
                        @endif
                    </td>
                    <td>
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
@endsection