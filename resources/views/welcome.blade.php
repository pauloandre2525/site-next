@extends('layouts.site')


@section('conteudo')



<div class="carousel carousel-slider center">
    <a class="carousel-item" href="#one!"><img src="{{ asset('img/slide1.jpg')}}"></a>
    <a class="carousel-item" href="#two!"><img src="{{ asset('img/slide2.jpg')}}"></a>
    <a class="carousel-item" href="#three!"><img src="{{ asset('img/slide3.jpg')}}"></a>
</div>

<!-- Sobre Nós -->
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12 m6">
                <h2 class="center yellow-text text-darken-3">Sobre Nós</h2>
                <p class="justify-text">A Luz Solar Brasil nasceu no sentimento de contribuir com o crescimento de energia limpa e renovável em todo o país, com a direção de seu sócio fundador Vasni Pereira um empresário dedicado e comprometido com o trabalho, a LSB está a cada dia ganhando mercado em vários estados, atraindo novos parceiros, colaboradores e se destacando no mercado fotovotaico. Hoje a empresa trabalha principalmente em quadro vias (industrial, comercial, rural e residencial) tanto no desenvolvimento e instalação de projetos fotovotaicos como também na limpeza e manutenção dos mesmos.</p>
            </div>
        </div>
    </div>
</div><!-- Fim do Sobre nós -->


<!-- Icones -->
<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">

        <div class="col s12">
            <h4 class="center blue-text">O QUE FAZEMOS</h4>
        </div>
        <div class="col s12">
            <h6 class="center blue-grey-text">Desenvolvimento e Instalação de Projetos Fotovotaicos para</h6>
        </div>
        <div class="row">
            <div class="col s12 m3">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center red-text">INDUSTRIAL</h5>

                    <p class="center blue-text">Desenvolvemos e instalamos todo o projeto para que a sua indústria pare de pagar uma dívida eterna de eletricidade e passe a economizar deixando o sol ser o seu melhor colaborador.</p>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center red-text">Comercial</h5>

                    <p class="center blue-text">Desenvolvemos e instalamos todo o projeto para que seu negócio pare de pagar uma dívida eterna de eletricidade e passe a economizar deixando o sol ser o seu melhor colaborador.</p>
                </div>
            </div>

            <div class="col s12 m3 ">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                    <h5 class="center red-text">RURAL</h5>

                    <p class="center blue-text">Desenvolvemos e instalamos todo o projeto para que sua área rural pare de pagar uma dívida eterna de eletricidade e passe a economizar deixando o sol gerar a sua energia.</p>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center red-text">RESIDENCIAL</h5>

                    <p class="center blue-text">Desenvolvemos e instalamos todo o projeto para sua residência, assim você trocará uma dívida eterna de eletricidade e passará a economizar deixando o sol gerar a sua energia.</p>
                </div>
            </div>

        </div>
        <div class="parallax"><img src="{{ asset('img/background1.jpg')}}" alt="Unsplashed background img 2"></div>
    </div>

</div><!-- Fim ícones -->




<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4>NOSSA EQUIPE</h4>
                <p class="center-align blue-text darken-5">Conheça a Nossa equipe de Profissionais que estão prontos para te atender e oferecer os melhores Preços e Condições, para você adiquirir hoje mesmo o seu Kit Fotovotaico.</p>
            </div>
        </div>

        <div class="carousel">
            <a class="carousel-item" href="https://wa.me/5575988980838" target="_blank"><img src="{{ asset('img/icone1.png')}}"></a>
            <a class="carousel-item" href="#two!"><img src="{{ asset('img/icone2.png')}}"></a>
            <a class="carousel-item" href="#three!"><img src="{{ asset('img/icone3.png')}}"></a>
            <a class="carousel-item" href="#four!"><img src="{{ asset('img/icone1.png')}}"></a>
            <a class="carousel-item" href="#five!"><img src="{{ asset('img/icone2.png')}}"></a>
        </div>

    </div>
</div>


<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light">NOTÍCIAS</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="{{ asset('img/background3.jpg')}}" alt=""></div>
</div>

@endsection