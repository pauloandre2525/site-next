@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Cadastrar membro da Equipe
    </div>
    <div class="card-body">
        <x-alert />


        <form action="{{ route('admin.equipe.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" style="text-transform: capitalize">
            </div>
            <div class="mb-3">
                <label for="funcao" class="form-label">Função:</label>
                <select id="funcao" class="form-select" name="funcao">
                    <option value="">Selecione...</option>
                    <option value="CEO">CEO</option>
                    <option value="Diretor">Diretor</option>
                    <option value="Gerente de Vendas">Gerente de Vendas</option>
                    <option value="Vendedor">Vendedor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="#">
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="#">
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram" value="#">
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