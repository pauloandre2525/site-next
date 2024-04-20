@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar Portifólio
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.portifolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" style="text-transform:uppercase">
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
                <label for="cliente" class="form-label">Cliente:</label>
                <input type="text" class="form-control" id="cliente" name="cliente">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <select id="categoria" class="form-select" name="categoria">
                    <option value="">Selecione...</option>
                    <option value="residencial">Redencial</option>
                    <option value="empresarial">Empresarial</option>
                    <option value="rural">Rural</option>
                    <option value="industrial">Industrial</option>
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