@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header" style="text-transform: capitalize">
        Atualizar membro da Equipe - {{ $equipe->nome }}
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.equipe.update', ['equipe' => $equipe->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" style="text-transform: capitalize" value="{{ old('nome', $equipe->nome) }}">
            </div>
            <div class="mb-3">
                <label for="funcao" class="form-label">Função:</label>
                <select id="funcao" class="form-select" name="funcao">
                    <option value="CEO" {{ $equipe->funcao == 'CEO' ? 'selected' : '' }}>CEO</option>
                    <option value="Diretor" {{ $equipe->funcao == 'Diretor' ? 'selected' : '' }}>Diretor</option>
                    <option value="Gerente de Vendas" {{ $equipe->funcao == 'Gerente de Vendas' ? 'selected' : '' }}>Gerente de Vendas</option>
                    <option value="Vendedor" {{ $equipe->funcao == 'Vendedor' ? 'selected' : '' }}>Vendedor</option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem', $equipe->imagem) }}">
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $equipe->whatsapp) }}">
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $equipe->facebook) }}">
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $equipe->instagram) }}">
            </div>
            <div class=" mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo" {{ $equipe->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ $equipe->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection