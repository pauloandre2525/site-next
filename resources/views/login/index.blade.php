@extends('layouts.login')


@section('conteudo')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-5">

                <div class="card shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="col-md-12"> 
                            <div class="p-5">
                                <div>
                                    <img src="{{ $config->logo }}" class="mx-auto d-block mb-5" width="250px">
                                </div>

                                <hr>
                                <x-alert />
                                <form action="{{ route('login.process') }}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp" placeholder="Insira o endereço de email" value="{{ old('email') }}">
                                    </div>
                                    <div class=" form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Senha" value="{{ old('password') }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Entrar
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Esqueceu sua senha?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Criar conta!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    @endsection