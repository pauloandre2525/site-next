@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Sobre Nós - {{ $sobre->periodo }}
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.sobre.update', ['sobre' => $sobre->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="periodo" class="form-label">Período:</label>
                <input type="text" class="form-control" id="periodo" name="periodo" style="text-transform:uppercase" value="{{ old('periodo', $sobre->periodo) }}">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" style="text-transform:uppercase" value="{{ old('titulo', $sobre->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $sobre->descricao) }}">
            </div>
            <div class=" mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem', $sobre->imagem) }}">
            </div>
            <div class=" mb-3">
                <label for="posicaoimagem" class="form-label">Posição da Imagem:</label>
                <select id="posicaoimagem" class="form-select" name="posicaoimagem">
                    <option value="timeline" {{ $sobre->posicaoimagem == 'timeline' ? 'selected' : '' }}>Direita</option>
                    <option value="timeline-inverted" {{ $sobre->posicaoimagem == 'timeline-inverted' ? 'selected' : '' }}>Esquerda</option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo" {{ $sobre->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ $sobre->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection