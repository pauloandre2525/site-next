@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Banner Header
        <a href="{{ route('admin.banner.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Legenda</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                <tr>
                    <th scope="row">{{ $banner->id }}</th>
                    <td>{{ $banner->name }}</td>
                    <td>{{ $banner->legenda }}</td>
                    <td><img src="{{ asset('images/'.$banner->imagem) }}" width="100px"> </td>
                    <td>{{ $banner->status }}</td>
                    <td>
                        <a href="{{ route('admin.banner.show', ['banner' => $banner->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
</div>
@endsection