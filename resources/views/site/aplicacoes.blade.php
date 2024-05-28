@extends('layouts.site')


@section('conteudo')

<section class="container" id="servicos">
    <h1 class="text-center">Aplicações</h1>
    <hr>

    <div class="row justify-content-center text-center">
        @foreach ($servicos as $key => $servico)
        <div class="col-md-3">
            <span class="fa-stack fa-4x">
                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                <i class="{{ $servico->imagem }} fa-stack-1x fa-inverse"></i>
            </span>

            <h4 class="my-3" style="text-transform:uppercase">{{ $servico->titulo }}</h4>
            <p class="text-muted">{{ $servico->descricao }}</p>
        </div>
        @endforeach

    </div>
</section>