@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Serviço - {{ $servico->titulo }}
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.servico.update', ['servico' => $servico->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" style="text-transform:uppercase" value="{{ old('titulo', $servico->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao', $servico->descricao) }}</textarea>
            </div>
            <div class=" mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <select class="form-control" id="imagem" name="imagem">
                    <option value="fas fa-house" {{ $servico->imagem == 'fas fa-house' ? 'selected' : '' }}>Casa </option>
                    <option value="fas fa-industry" {{ $servico->imagem == 'fas fa-industry' ? 'selected' : '' }}>Industria</option>
                    <option value="fas fa-city" {{ $servico->imagem == 'fas fa-city' ? 'selected' : '' }}>Empresa</option>
                    <option value="fas fa-warehouse" {{ $servico->imagem == 'fas fa-warehouse' ? 'selected' : '' }}>Fazenda</option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo" {{ $servico->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ $servico->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection