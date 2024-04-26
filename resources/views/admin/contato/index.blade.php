@extends('layouts.admin')


@section('conteudo')

<div class="card">
    <div class="card-header">
        Contatos
    </div>
    <x-alert />
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Mensagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contatos as $contato)
                <tr>
                    <th scope="row">{{ $contato->id }}</th>
                    <td style="text-transform: capitalize">{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->telefone }}</td>
                    <td>{{ $contato->texto }}</td>
                    <td>
                        <a href="{{ route('admin.contato.show', ['contato' => $contato->id]) }}" class="btn btn-info btn-sm" title="Visualizar"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contatos->onEachSide(0)->links() }}
    </div>
</div>
@endsection