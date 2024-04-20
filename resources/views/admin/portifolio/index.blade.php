@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Portifólio
        @can('create-portifolio')
        <a href="{{ route('admin.portifolio.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portifolios as $portifolio)
                <tr>
                    <th scope="row">{{ $portifolio->id }}</th>
                    <td style="text-transform:uppercase">{{ $portifolio->nome }}</td>
                    <td>{{ $portifolio->descricao }}</td>
                    <td><img src="{{ $portifolio->imagem }}" width="100px"> </td>
                    <td>{{ $portifolio->cliente }}</td>
                    <td>{{ $portifolio->categoria }}</td>
                    <td>{{ $portifolio->status }}</td>
                    <td>
                        <a href="{{ route('admin.portifolio.show', ['portifolio' => $portifolio->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        @can('edit-portifolio')
                        <a href="{{ route('admin.portifolio.edit', ['portifolio' => $portifolio->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $portifolios->links() }}
    </div>
</div>
@endsection