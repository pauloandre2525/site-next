@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar Sobre Nós
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.sobre.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="periodo" class="form-label">Período:</label>
                <input type="text" class="form-control" id="periodo" name="periodo" style="text-transform:uppercase">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" style="text-transform:uppercase">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>
            <div class="mb-3">
                <label for="posicaoimagem" class="form-label">Posição da imagem:</label>
                <select id="posicaoimagem" class="form-select" name="posicaoimagem">
                    <option value="">Selecione...</option>
                    <option value="timeline">Direita</option>
                    <option value="timeline-inverted">Esquerda</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </div>
</div>


@endsection