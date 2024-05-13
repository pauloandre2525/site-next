@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Usuários
        @can('create-user')
        <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan
    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Papel</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                        {{ $role }}
                        @empty
                        @endforelse
                    </td>
                    <td>
                        
                        <a href="{{ route('admin.user.show', ['user' => $user->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        
                        @can('edit-user')
                        <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
</div>



@endsection