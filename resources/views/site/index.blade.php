@extends('layouts.site')


@section('conteudo')

<!-- Masthead-->
<header class="">
    <div id="carouselBanner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banners as $key => $banner)
            <li data-target="#carouselBanner" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ $banner->imagem }}" class="d-block w-100" alt="{{ $banner->titulo }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $banner->titulo }}</h5>
                    <p>{{ $banner->legenda }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
</header>
<!-- Servicos-->
<section class="page-section" id="servicos">

    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Serviços</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
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
    </div>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
            @foreach($portifolios as $portifolio)
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $portifolio->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ $portifolio->imagem }}" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading" style="text-transform:uppercase">{{ $portifolio->nome }}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ $portifolio->descricao }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="sobre">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Sobre Nós</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

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
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="equipe">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Nossa Equipe</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <!-- para telas grandes -->
        <div id="carouselEquipe" class="carousel slide d-none d-sm-block" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($equipes->chunk(3) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $equipe)
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ $equipe->imagem }}" alt="..." />
                                <h4 style="text-transform: capitalize">{{ $equipe->nome }}</h4>
                                <p class="text-muted">{{ $equipe->funcao }}</p>
                                <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=55+{{$equipe->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="{{ $equipe->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="{{ $equipe->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselEquipe" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselEquipe" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- fim telas grandes -->

        <!-- para telas pequenas -->
        <div id="carouselEquipe" class="carousel slide d-lg-none d-xl-none" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($equipes as $equipe)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ $equipe->imagem }}" alt="..." />
                                <h4 style="text-transform: capitalize">{{ $equipe->nome }}</h4>
                                <p class="text-muted">{{ $equipe->funcao }}</p>
                                <a class="btn btn-dark btn-social mx-2" href="https://api.whatsapp.com/send?phone=55+{{$equipe->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="{{ $equipe->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-dark btn-social mx-2" href="{{ $equipe->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselEquipe" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselEquipe" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- fim para elas pequenas -->

        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
<!-- Clients-->
<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
            </div>
        </div>
    </div>
</div>

<!-- Contact-->
<section class="page-section" id="contato">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Fale conosco</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * Formulário de Contato * *-->

        <form id="contactForm" action="{{ route('contato') }}" method="POST" >
            @csrf
            @method('POST')
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Nome input-->
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Seu Nome *" required />
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" name="email" type="email" placeholder="Seu Email *" required />
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu Telefone *" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="texto" name="texto" placeholder="Sua Mensagem *" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Mensagem de sucesso -->
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif

            <!-- Mensagens de erro -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Menssagem</button></div>
        </form>
    </div>
</section>
@endsection