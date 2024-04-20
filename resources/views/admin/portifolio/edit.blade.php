@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Atualizar Portifólio - {{ $portifolio->titulo }}
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.portifolio.update', ['portifolio' => $portifolio->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" style="text-transform:uppercase" value="{{ old('nome', $portifolio->nome) }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $portifolio->descricao) }}">
            </div>
            <div class=" mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem', $portifolio->imagem) }}">
            </div>
            <div class=" mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <input type="text" class="form-control" id="cliente" name="cliente" value="{{ old('cliente', $portifolio->cliente) }}">
            </div>
            <div class=" mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <select id="categoria" class="form-select" name="categoria">
                    <option value="residencial" {{ $portifolio->categoria == 'residencial' ? 'selected' : '' }}>Residencial</option>
                    <option value="empresarial" {{ $portifolio->categoria == 'empresarial' ? 'selected' : '' }}>Empresarial</option>
                    <option value="rural" {{ $portifolio->categoria == 'rural' ? 'selected' : '' }}>Rural</option>
                    <option value="industrial" {{ $portifolio->categoria == 'industrial' ? 'selected' : '' }}>Industrial</option>
                </select>
            </div>
            <div class=" mb-3">
                <label for="status" class="form-label">Status:</label>
                <select id="status" class="form-select" name="status">
                    <option value="ativo" {{ $portifolio->status == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ $portifolio->status == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
</div>


@endsection