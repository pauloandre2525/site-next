@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header" style="text-transform: capitalize">
        Contato - {{ $contato->nome }}

        @can('index-contato')
        <a href="{{ route('admin.contato.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $contato->id }}</dd>

            <dt class="col-sm-2">Nome</dt>
            <dd class="col-sm-10" style="text-transform: capitalize">{{ $contato->nome }}</dd>

            <dt class="col-sm-2">Email</dt>
            <dd class="col-sm-10">{{ $contato->email }}</dd>

            <dt class="col-sm-2">Mensagem</dt>
            <dd class="col-sm-10">{{ $contato->texto }}</dd>
            
        </dl>

    </div>
</div>

@endsection