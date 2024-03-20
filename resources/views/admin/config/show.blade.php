<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>

<body>
    <h2>Detalhes da Configuração</h2>

    @if(session('success'))
    <p style="color: #082">{{ session('success') }}</p>
    @endif

    ID: {{ $config->id }}<br>
    Título: {{ $config->titulo }}<br>
    Slogan: {{ $config->slogan }}<br>
    Telefone: {{ $config->telefone }}<br>
    Endereço: {{ $config->endereco }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($config->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($config->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}<br>


</html>