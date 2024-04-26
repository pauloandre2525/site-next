@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header" style="text-transform: capitalize">
        Equipe - {{ $equipe->nome }}

        @can('edit-equipe')
        <a href="{{ route('admin.equipe.edit', ['equipe' => $equipe->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-equipe')
        <a href="{{ route('admin.equipe.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $equipe->id }}</dd>

            <dt class="col-sm-2">Nome</dt>
            <dd class="col-sm-10" style="text-transform: capitalize">{{ $equipe->nome }}</dd>

            <dt class="col-sm-2">Título</dt>
            <dd class="col-sm-10">{{ $equipe->funcao }}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><img src="{{ $equipe->imagem }}" width="200px"> </td>
            </dd>

            <dt class="col-sm-2">Whatsapp</dt>
            <dd class="col-sm-10">{{ $equipe->whatsapp }}</dd>

            <dt class="col-sm-2">Facebook</dt>
            <dd class="col-sm-10">{{ $equipe->facebook }}</dd>

            <dt class="col-sm-2">Instagram</dt>
            <dd class="col-sm-10">{{ $equipe->instagram }}</dd>

            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10">{{ $equipe->status }}</dd>
        </dl>

    </div>
</div>

@endsection