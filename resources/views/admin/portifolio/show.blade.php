@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Portifólio - {{ $portifolio->nome }}

        @can('edit-portifolio')
        <a href="{{ route('admin.portifolio.edit', ['portifolio' => $portifolio->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-portifolio')
        <a href="{{ route('admin.portifolio.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $portifolio->id }}</dd>

            <dt class="col-sm-2">Nome</dt>
            <dd class="col-sm-10" style="text-transform:uppercase">{{ $portifolio->nome }}</dd>

            <dt class="col-sm-2">Descrição</dt>
            <dd class="col-sm-10">{{ $portifolio->descricao }}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><img src="{{ asset($portifolio->imagem) }}" width="200px"> </td>
            </dd>

            <dt class="col-sm-2">Cliente</dt>
            <dd class="col-sm-10">{{ $portifolio->cliente }}</dd>

            <dt class="col-sm-2">Categoria</dt>
            <dd class="col-sm-10">{{ $portifolio->categoria }}</dd>

            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10">{{ $portifolio->status }}</dd>
        </dl>

    </div>
</div>

@endsection