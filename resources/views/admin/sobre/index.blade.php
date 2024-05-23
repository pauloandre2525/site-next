@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Sobre Nós
        @can('create-sobre')
        <a href="{{ route('admin.sobre.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Período</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sobres as $sobre)
                <tr>
                    <th scope="row">{{ $sobre->id }}</th>
                    <td style="text-transform:uppercase">{{ $sobre->periodo }}</td>
                    <td style="text-transform:uppercase">{{ $sobre->titulo }}</td>
                    <td>{{ $sobre->descricao }}</td>
                    <td><img src="{{ asset($sobre->imagem) }}" width="100px"> </td>
                    <td style="text-align: center;">
                        @if ($sobre->status == 'ativo')
                        <div class="badge rounded-pill text-bg-success">{{ $sobre->status }}</div>
                        @else
                        <div class="badge rounded-pill text-bg-danger">{{ $sobre->status }}</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.sobre.show', ['sobre' => $sobre->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        @can('edit-sobre')
                        <a href="{{ route('admin.sobre.edit', ['sobre' => $sobre->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection