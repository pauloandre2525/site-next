@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Permissões do Grupo de Usuário - {{ $role->name }}
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
                @foreach ($permissions as $permission)
                <tr>
                    <th>{{ $permission->id }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @if (in_array($permission->id, $rolePermissions ?? []))
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="window.location.href='{{ route('admin.role-permission.update', ['role' => $role->id, 'permission' => $permission->id ]) }}'" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Liberado</label>
                        </div>
                        @else
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" onclick="window.location.href='{{ route('admin.role-permission.update', ['role' => $role->id, 'permission' => $permission->id ]) }}'">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Bloqueado</label>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>



@endsection