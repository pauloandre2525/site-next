@extends('layouts.site')


@section('conteudo')

<section class="page-section" id="contato">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Fale conosco</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * Formulário de Contato * *-->

        <form id="contactForm" action="{{ route('contato') }}" method="POST">
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
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Mensagem</button></div>
        </form>
    </div>
</section>

@endsection