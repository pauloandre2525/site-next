@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Sobre Nós - {{ $sobre->periodo }}

        @can('edit-sobre')
        <a href="{{ route('admin.sobre.edit', ['sobre' => $sobre->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-sobre')
        <a href="{{ route('admin.sobre.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $sobre->id }}</dd>

            <dt class="col-sm-2">Período</dt>
            <dd class="col-sm-10" style="text-transform:uppercase">{{ $sobre->periodo }}</dd>

            <dt class="col-sm-2">Título</dt>
            <dd class="col-sm-10" style="text-transform:uppercase">{{ $sobre->titulo }}</dd>

            <dt class="col-sm-2">Descrição</dt>
            <dd class="col-sm-10">{{ $sobre->descricao }}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><img src="{{ asset($sobre->imagem) }}" width="200px"> </td>
            </dd>

            <dt class="col-sm-2">Posição da Imagem</dt>
            <dd class="col-sm-10">{{ $sobre->posicaoimagem }}</dd>

            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10">{{ $sobre->status }}</dd>
        </dl>

    </div>
</div>

@endsection