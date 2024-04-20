@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Serviço - {{ $servico->titulo }}

        @can('edit-servico')
        <a href="{{ route('admin.servico.edit', ['servico' => $servico->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-servico')
        <a href="{{ route('admin.servico.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $servico->id }}</dd>

            <dt class="col-sm-2">Título</dt>
            <dd class="col-sm-10">{{ $servico->titulo }}</dd>

            <dt class="col-sm-2">Legenda</dt>
            <dd class="col-sm-10">{{ $servico->legenda }}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><i class="{{ $servico->imagem }}"></i></dd>

            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10">{{ $servico->status }}</dd>
        </dl>

    </div>
</div>

@endsection