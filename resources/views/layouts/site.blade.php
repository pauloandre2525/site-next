<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>:: {{ $config->titulo }} ::</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href={{ $config->favicon }} />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet" />




<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ $config->logo }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/#servicos') }}">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/#portfolio') }}">Portifólio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/#sobre') }}">Sobre Nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/#equipe') }}">Equipe</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ asset('/#contato') }}">Contato</a></li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('conteudo')


    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-lg-start ">Copyright &copy; {{ $config->titulo }}</b>
                </div>
                <div class="col-lg-2 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-5 text-lg-end">

                    <a class="link-dark text-decoration-none text-align-center" href="https://nextsolucoesweb.com.br/" target="_blanck">Desenvolvido por <b>NEXT Soluções WEB</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    @foreach ($portifolios as $portifolio)
    <div class="portfolio-modal modal fade" id="portfolioModal{{ $portifolio->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">{{ $portifolio->nome }}</h2>
                                <p class=" item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="{{ $portifolio->imagem }}" alt="..." />
                                <p>{{ $portifolio->descricao }}</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Cliente:</strong>
                                        {{ $portifolio->cliente }}
                                    </li>
                                    <li>
                                        <strong>Categoria:</strong>
                                        {{ $portifolio->categoria }}
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Fechar Projeto
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <!-- Core theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js//bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script> -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>