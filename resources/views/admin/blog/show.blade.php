@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Notícia - {{ $blog->titulo }}

        @can('edit-blog')
        <a href="{{ route('admin.blog.edit', ['blog' => $blog->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-blog')
        <a href="{{ route('admin.blog.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <dl class="row">
            <dt class="col-sm-2">ID</dt>
            <dd class="col-sm-10">{{ $blog->id }}</dd>

            <dt class="col-sm-2">Título</dt>
            <dd class="col-sm-10">{{ $blog->titulo }}</dd>

            <dt class="col-sm-2">Resumo</dt>
            <dd class="col-sm-10">{{ $blog->resumo }}</dd>

            <dt class="col-sm-2">Conteúdo</dt>
            <dd class="col-sm-10">{!! $blog->conteudo !!}</dd>

            <dt class="col-sm-2">Imagem</dt>
            <dd class="col-sm-10"><img src="{{ asset($blog->imagem) }}" width="200px"> </td>
            </dd>

            <dt class="col-sm-2">Editor</dt>
            <dd class="col-sm-10">{{ $blog->editor }}</dd>
        </dl>

    </div>
</div>

@endsection