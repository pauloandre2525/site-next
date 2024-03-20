@extends('layouts.admin')


@section('conteudo')
@forelse ($configs as $config)
<div class="card">
    <div class="card-header">
        Configurações do Site
        <a href="{{ route('admin.config.edit', ['config' => $config->id ]) }}"><button type="button" class="btn btn-primary btn-sm float-end">Editar</button></a>
    </div>

    <div class="card-body">

        <x-alert />



        <form class="row g-3">
            <input type="hidden" name="id" value="{{ old('id', $config->id) }}">

            <div class="col-md-6">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo', $config->titulo) }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label">Slogan</label>
                <input type="text" name="slogan" class="form-control" id="slogan" value="{{ old('slogan', $config->slogan) }}" disabled>
            </div>
            <div class="col-12">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="telefone" value="{{ old('telefone', $config->telefone) }}" disabled>
            </div>
            <div class="col-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="endereco" value=" {{ old('endereco', $config->endereco) }}" disabled>
            </div>

        </form>
        @empty

        @endforelse
    </div>
</div>

@endsection