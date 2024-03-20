@extends('layouts.admin')


@section('conteudo')



<form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Nome:</label><br>
    <input type="text" id="name" name="name"><br>
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