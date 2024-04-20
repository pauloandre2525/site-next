@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Banner
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.banner.update', ['banner' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $banner->titulo) }}">
            </div>
            <div class="mb-3">
                <label for="legenda" class="form-label">Legenda:</label>
                <input type="text" class="form-control" id="legenda" name="legenda" value="{{ old('legenda', $banner->legenda) }}">
            </div>
            <div class=" mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem', $banner->imagem) }}">
            </div>
            <div class=" mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection