@extends('layouts.site')


@section('conteudo')

<section class="container">
    <h1 class="text-center">Sobre Nós</h1>
    <hr>

    <ul class="timeline">
        @foreach($sobres as $sobre)
        <li class="{{ $sobre->posicaoimagem }}">
            <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ $sobre->imagem }}" alt="..." /></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4>{{ $sobre->periodo }}</h4>
                    <h4 class="subheading">{{ $sobre->titulo }}</h4>
                </div>
                <div class="timeline-body">
                    <p class="text-muted">{{ $sobre->descricao }}</p>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
</section>