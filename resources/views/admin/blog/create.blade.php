@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar Noícias
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

        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="mb-3">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea type="textarea" class="form-control" id="resumo" name="resumo"></textarea>
            </div>
            <div class="mb-3">
                <label for="conteudo" class="form-label">Conteúdo:</label>
                <textarea type="textarea" rows="4" c class="form-control" id="conteudo" name="conteudo"></textarea>
            </div>

            <div id="image-upload">Clique ou arraste a imagem aqui</div>
            <input type="file" id="imagem" name="imagem" style="display: none;">

            <div class="mb-3">
                <label for="editor" class="form-label">Editor:</label>
                <input type="text" class="form-control" id="editor" name="editor">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </div>
</div>


@endsection