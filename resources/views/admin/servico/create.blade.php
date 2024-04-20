@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar Serviço
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.servico.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" style="text-transform:uppercase">
            </div>
            <div class=" mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <select class="form-control" id="imagem" name="imagem">
                    <option value="fas fa-house">Casa</option>
                    <option value="fas fa-industry">Industria</option>
                    <option value="fas fa-city">Empresa</option>
                    <option value="fas fa-warehouse">Fazenda</option>
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