<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Luz Solar Brasil</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{ asset('css/fontawesome-all.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>

    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="{{ asset('img/logo.png')}}" class="logo-img"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">A EMPRESA</a></li>
                <li><a href="#">PRODUTOS</a></li>
                <li><a href="#">PORTIFÓLIO</a></li>
                <li><a href="#">CLIENTES</a></li>
                <li><a href="#">NOTÍCIAS</a></li>
                <li><a href="#">CONTATOS</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">A EMPRESA</a></li>
                <li><a href="#">PRODUTOS</a></li>
                <li><a href="#">PORTIFÓLIO</a></li>
                <li><a href="#">CLIENTES</a></li>
                <li><a href="#">NOTÍCIAS</a></li>
                <li><a href="#">CONTATOS</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    @yield('conteudo')



    <footer class="page-footer indigo darken-3">
        <div class="container">
            <div class="row">
                <div class="col l5 s12">
                    <a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="{{ asset('img/logo.png')}}" class="logo-img"></a>
                </div>

                <div class="col l4 s12">
                    <h5 class="white-text">PÁGINAS</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-4" href="#">A Empresa</a></li>
                        <li><a class="grey-text text-lighten-4" href="#">Produtos</a></li>
                        <li><a class="grey-text text-lighten-4" href="#">Portifólio</a></li>
                        <li><a class="grey-text text-lighten-4" href="#">Clientes</a></li>
                        <li><a class="grey-text text-lighten-4" href="#">Notícias</a></li>
                        <li><a class="grey-text text-lighten-4" href="#">Contatos</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">NOSSAS REDES</h5>
                    <a href="#" class="btn-floating btn-large red darken-4 pulse"><i class="fa-brands fa-youtube fa-2xl" style="color: #00000;"></i></a>
                    <a href="#" class="btn-floating btn-large green pulse"><i class="fa-brands fa-whatsapp fa-2xl" style="color: #00000"></i></a>
                    <a href="#" class="btn-floating btn-large orange darken-4 pulse"><i class="fa-brands fa-square-instagram fa-2xl" style="color: #00000"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Desenvolvido por <a class="brown-text text-lighten-3" href="https://nextsolucoesweb.com.br" target="_blank">Next Soluções WEB</a>
            </div>
        </div>
    </footer>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/materialize.js')}}"></script>
    <script src="{{ asset('js/init.js')}}"></script>
    <script src="{{ asset('js/carousel.js')}}"></script>
    <script src="{{ asset('js/fontawesome-all.js')}}"></script>



</body>

</html>