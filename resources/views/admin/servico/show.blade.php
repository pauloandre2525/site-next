@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Serviço - {{ $servico->titulo }}

        @can('edit-servico')
        <a href="{{ route('admin.servico.edit', ['servico' => $servico->id]) }} " class="btn btn-success btn-sm float-end  ml-3">Editar</a>
        @endcan

        @can('index-servico')
        <a href="{{ route('admin.servico.index') }} " class="btn btn-warning btn-sm float-end">Listar</a>
        @endcan
    </div>

    <div class="card-body">

        <x-alert />

        <div class="row">
            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>ID</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $servico->id }}
            </div>

            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Título</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $servico->titulo }}
            </div>

            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Legenda</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $servico->descricao }}
            </div>

            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Imagem</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                <i class="{{ $servico->imagem }}"></i>
            </div>

            <div class="col-sm-1 col-4 py-1 d-flex align-items-center" style="background-color: #ccc; border: 1px solid #ffffff">
                <strong>Status</strong>
            </div>
            <div class="col-sm-11 col-8 py-1">
                {{ $servico->status }}
            </div>

        </div>
    </div>

    @endsection