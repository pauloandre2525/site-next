@extends('layouts.admin')

@section('conteudo')

<div class="card">
    <div class="card-header">
        Banner - {{ $banner->titulo }}

        @can('edit-banner')
        <a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}" class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-banner')
        <a href="{{ route('admin.banner.index') }}" class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Título:</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $banner->titulo }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Legenda:</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $banner->legenda }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Imagem:</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                <img src="{{ asset($banner->imagem) }}" class="img-fluid" alt="Imagem do Banner">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Link para:</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $banner->link }}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Status:</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $banner->status }}
            </div>
        </div>
    </div>
</div>

@endsection