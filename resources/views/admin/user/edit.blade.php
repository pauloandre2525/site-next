@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Usuário
    </div>

    <div class="card-body">

        <x-alert />


        <form class="row g-3" action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="name" class="form-label">Nome: </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome do Usuário " value="{{ old('titulo', $user->name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email do Usuário " value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="col-mb-3">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password', $user->password) }}">
            </div>

            <div class="mb-3">
                <label for="roles" class="form-label">Papel</label>
                <select name="roles" class="form-select" id="roles">
                    <option value="">Selecione</option>
                    @forelse ($roles as $role)
                    @if ($role != "Super Admin")
                    <option value="{{ $role }}" {{ old('roles') == $role || $role == $userRoles ? 'selected' : '' }}>{{ $role }} </option>
                    @else
                    @if (Auth::user()->hasRole('Super Admin'))
                    <option value="{{ $role }}" {{ old('roles') == $role || $role == $userRoles ? 'selected' : '' }}>{{ $role }} </option>
                    @endif
                    @endif
                    @empty
                    <option value="">Nenhum papel disponível</option>
                    @endforelse
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection