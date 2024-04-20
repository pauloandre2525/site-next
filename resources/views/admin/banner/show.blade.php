@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Banner - {{ $banner->titulo }}
        
        @can('edit-banner')
        <a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }} "class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-banner')
        <a href="{{ route('admin.banner.index') }} "class="btn btn-warning btn-sm float-end" >Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $banner->id }}</dd>
        
            <dt class="col-sm-2">Título</dt>
            <dd class="col-sm-10">{{ $banner->titulo }}</dd>

            <dt class="col-sm-2">Legenda</dt>
            <dd class="col-sm-10">{{ $banner->legenda }}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><img src="{{ $banner->imagem }}" width="200px"> </td></dd>

            <dt class="col-sm-2">Status</dt>
            <dd class="col-sm-10">{{ $banner->status }}</dd>
        </dl>
 
    </div>
</div>

@endsection