@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Configurações do Site
    </div>

    <div class="card-body">

        <x-alert />


        <form class="row g-3" action="{{ route('admin.config.update', ['config' => $config->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="titulo" class="form-label">Título: </label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título do Site " value="{{ old('titulo', $config->titulo) }}" required>
            </div>
            <div class="col-md-6">
                <label for="slogan">Slogan: </label>
                <input type="text" name="slogan" id="slogan" class="form-control" placeholder="Descrição do Site " value="{{ old('slogan', $config->slogan) }}" required>
            </div>
            <div class="col-md-6">
                <label for="telefone">Telefone: </label>
                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone " value="{{ old('telefone', $config->telefone) }}" required>
            </div>
            <div class="col-md-6">
                <label for="endereco">Endereço: </label>
                <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço " value="{{ old('endereco', $config->endereco) }}" required>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection