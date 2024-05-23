@extends('layouts.site')


@section('conteudo')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $blog->titulo }}</li>
        </ol>
    </nav>
    <hr>

    <div class="container">

        <div class="row justify-content-center">

            <!-- Blog Entries Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $blog->titulo }}</h1>

                <!-- Author -->
                <p class="lead">
                    por
                    <a href="#">{{ $blog->editor }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>
                    Criado em: {{ $blog->created_at->timezone('America/Sao_Paulo')->format('d/m/Y H:i') }}
                    @if($blog->created_at != $blog->updated_at)
                    | Atualizado em: {{ $blog->updated_at->timezone('America/Sao_Paulo')->format('d/m/Y H:i') }}
                    @endif
                </p>


                <hr>

                <!-- Preview Image -->
                <img class="card-img-top" src="{{ asset($blog->imagem) }}" alt="Card image cap">

                <hr>

                <!-- Post Content -->
                <div>
                    {!! $blog->conteudo !!}
                </div>

                <hr>

                <!-- Compartilhar -->
                <div class="row col-md-6 sm-12">
                    <div class="col-md-7 d-flex justify-content-center">
                        <p><b>Compartilhe esta publicação: </b></p>
                    </div>
                    <div class="col-md-2 mt-3 mb-4 d-flex justify-content-center">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode('Confira este post: ' . asset($blog->slug)) }}" target="_blank"><i class="fa-brands fa-square-whatsapp fa-bounce fa-2xl ms-5 me-4" style="color: #1bb007;"></i></a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(asset($blog->slug)) }}" target="_blank"><i class="fa-brands fa-facebook fa-bounce fa-2xl" style="color: #0c52ca;"></i></a>
                    </div>

                </div>

            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->



</section>