@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">

        <h2>Cadastrar Usuários</h2>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nome do Usuário">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email')}}" placeholder="Email do Usuário">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <label for="roles" class="form-label">Papel</label>
                    <select name="roles" class="form-select" id="roles">
                        <option value="">Selecione</option>
                        @forelse ($roles as $role)
                            @if ($role != "Super Admin")
                                <option value="{{ $role }}" {{ old('roles') == $role ? 'selected' : '' }}>{{ $role }} </option>
                            @else 
                                @if (Auth::user()->hasRole('Super Admin'))
                                    <option value="{{ $role }}" {{ old('roles') == $role ? 'selected' : '' }}>{{ $role }} </option>
                                @endif
                            @endif
                            @empty
                            <option value="">Nenhum papel disponível</option>
                        @endforelse
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection