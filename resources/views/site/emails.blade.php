<!DOCTYPE html>
<html>

<head>
    <title>Mensagem enviada com sucesso!</title>
</head>

<body>
    <h1>Obrigado por entrar em contato, {{ $nome }}!</h1>
    <p>Recebemos sua mensagem e entraremos em contato em breve.</p>
    <p>Aqui estão os detalhes que você forneceu:</p>
    <ul>
        <li>Nome: {{ $nome }}</li>
        <li>Email: {{ $email }}</li>
        <li>Telefone: {{ $telefone }}</li>
        <li>Mensagem: {{ $texto }}</li>
    </ul>
</body>

</html>