@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Equipe
        @can('create-equipe')
        <a href="{{ route('admin.equipe.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Função</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Whatsapp</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                <tr>
                    <th scope="row">{{ $equipe->id }}</th>
                    <td style="text-transform: capitalize">{{ $equipe->nome }}</td>
                    <td>{{ $equipe->funcao }}</td>
                    <td><img src="{{ $equipe->imagem }}" width="100px"> </td>
                    <td>{{ $equipe->whatsapp }}</td>
                    <td>{{ $equipe->facebook }}</td>
                    <td>{{ $equipe->instagram }}</td>
                    <td>{{ $equipe->status }}</td>
                    <td>
                        <a href="{{ route('admin.equipe.show', ['equipe' => $equipe->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        @can('edit-equipe')
                        <a href="{{ route('admin.equipe.edit', ['equipe' => $equipe->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection