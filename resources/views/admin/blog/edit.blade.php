@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Notícia - {{ $blog->titulo }}
    </div>
    <div class="card-body">
        <x-alert />

        <style>
            #image-upload {
                width: 200px;
                height: 200px;
                border: 2px dashed #ccc;
                background-size: cover;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>

        <form action="{{ route('admin.blog.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $blog->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea class="form-control" id="resumo" name="resumo">{{ old('resumo', $blog->resumo) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="conteudo" class="form-label">Conteúdo:</label>
                <textarea class="form-control" id="conteudo" name="conteudo">{{ old('conteudo', $blog->conteudo) }}</textarea>
            </div>

            <div id="image-upload" style="background-image: url('{{ asset($blog->imagem) }}')">Clique ou arraste a imagem aqui</div>
            <input type="file" id="imagem" name="imagem" style="display: none;">

            <div class="mb-3">
                <label for="editor" class="form-label">Editor:</label>
                <input type="text" class="form-control" id="editor" name="editor" value="{{ old('editor', $blog->editor) }}">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection