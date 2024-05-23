@extends('layouts.site')


@section('conteudo')
<section>
    <div class="container">
        <h1 class="text-center">Notícias do Blog</h1>
        <hr>

        <div class="row justify-content-center col-lg-9">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mt-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($blog->imagem) }}" class="card-img-top" alt="{{ $blog->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->titulo }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($blog->conteudo), 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blogshow', $blog->slug) }}" class="btn btn-sm btn-info">Leia mais... <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>