@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar Banner
    </div>
    <div class="card-body">
        <x-alert />

        <style>
            #image-upload {
                width: 100%;
                height: 400px;
                background-size: cover;
                background-position: center;
                border: 2px dashed #ccc;
                background-size: cover;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            @media (max-width: 767px) {
                #image-upload {
                    height: 100px;
                    /* Altura de 100px para telas pequenas */
                }
            }
        </style>

        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="mb-3">
                <label for="legenda" class="form-label">Legenda:</label>
                <input type="text" class="form-control" id="legenda" name="legenda">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <div id="image-upload">Clique ou arraste a imagem aqui</div>
                <input type="file" id="imagem" name="imagem" style="display: none;">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link para:</label>
                <input type="text" class="form-control" id="link" name="link">
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