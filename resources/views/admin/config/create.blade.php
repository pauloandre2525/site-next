<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
</head>

<body>

    <h2>Cadastrar Configurações</h2>

    <x-alert />

    <form action="{{ route('admin.config.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Título: </label>
        <input type="text" name="titulo" placeholder="Título do Site" value="{{ old('titulo') }}" required></br></br>

        <label>Descrição: </label>
        <input type="text" name="slogan" placeholder="Descrição do Site" value="{{ old('slogan') }}" required></br></br>

        <label>Logo: </label>
        <input type="file" name="logo" placeholder="" value="{{ old('logo') }}" required></br></br>

        <label>Icone: </label>
        <input type="file" name="favicon" placeholder="" value="{{ old('favicon') }}" required></br></br>

        <label>Telefone: </label>
        <input type="text" name="telefone" placeholder="Informe o Telefone" value="{{ old('telefone') }}" required></br></br>

        <label>Endereço: </label>
        <input type="text" name="endereco" placeholder="Informe o Endereço" value="{{ old('endereco') }}" required></br></br>

        <button type="submit">Cadastrar</button>
    </form>

</body>

</html>