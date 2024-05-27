@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Banner Topo
        @can('create-banner')
        <a href="{{ route('admin.banner.create') }}" class="btn btn-success btn-sm float-end">Novo</a>
        @endcan

    </div>
    <x-alert />
    <div class="card-body">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col" style="text-align: center;" class="d-none d-sm-table-cell">Imagem</th>
                        <th scope="col" style="text-align: center;">Status</th>
                        <th scope="col" style="text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                    <tr>
                        <td class="align-middle">{{ $banner->titulo }}</td>
                        <td class="align-middle d-none d-sm-table-cell" style="text-align: center;" ><img src="{{ asset($banner->imagem) }}" width="100px"> </td>
                        <td class="align-middle" style="text-align: center;">
                            @if ($banner->status == 'ativo')
                            <div class="badge rounded-pill text-bg-success">{{ $banner->status }}</div>
                            @else
                            <div class="badge rounded-pill text-bg-danger">{{ $banner->status }}</div>
                            @endif
                        </td>
                        <td class="align-middle" style="text-align: center;">
                            <a href="{{ route('admin.banner.show', ['banner' => $banner->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                            @can('edit-banner')
                            <a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection