@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Grupos de Usuários
        @can('create-role')
        <a href="{{ route('admin.role.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan
    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('admin.role-permission.index', ['role' => $role->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
</div>



@endsection