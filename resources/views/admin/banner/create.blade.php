@extends('layouts.admin')


@section('conteudo')



<form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="legenda">Legenda:</label><br>
    <input type="text" id="legenda" name="legenda"><br>
    <label for="imagem">Imagem:</label><br>
    <input type="file" id="imagem" name="imagem"><br>
    <label for="status">Status:</label><br>
    <select id="status" name="status">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
    </select><br>
    <input type="submit" value="Cadastrar Banner">
</form>


@endsection