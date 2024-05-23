@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Notícias
        @can('create-blog')
        <a href="{{ route('admin.blog.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Resumo</th>
                    <th scope="col" style="text-align: center;">Imagem</th>
                    <th scope="col" style="text-align: center;">Editor</th>
                    <th scope="col" style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->titulo }}</td>
                    <td>{{ $blog->resumo }}</td>
                    <td style="text-align: center;"><img src="{{ asset($blog->imagem) }}" width="100px"> </td>
                    <td>{{ $blog->editor }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('admin.blog.show', ['blog' => $blog->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        @can('edit-blog')
                        <a href="{{ route('admin.blog.edit', ['blog' => $blog->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection