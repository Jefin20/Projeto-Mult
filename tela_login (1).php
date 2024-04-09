<?php
session_start(); // Iniciar a sessão antes de qualquer saída para o navegador

include('conexao.php'); // Inclui o arquivo de conexão com o banco de dados

if(isset($_POST['user_id']) && isset($_POST['senha'])) {

    $user_id = $mysqli->real_escape_string($_POST['user_id']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Consulta o banco de dados para obter informações do usuário, incluindo a permissão de login
    $sql_code = "SELECT * FROM usuários WHERE user_id = '$user_id' AND senha = '$senha' AND permissao_login = 1";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if($sql_query->num_rows == 1) {

        $usuario = $sql_query->fetch_assoc();

        // Incrementa o contador de login no banco de dados
        $contador_login = $usuario['contador_login'] + 1;
        $sql_update = "UPDATE usuários SET contador_login = $contador_login WHERE user_id = '$user_id'";
        $mysqli->query($sql_update) or die("Falha na atualização do contador de login: " . $mysqli->error);

        $_SESSION['Id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("location: painel.php"); // Redireciona para a página do painel após o login

    } else {
        echo "Falha ao logar! user_id ou senha incorretos ou permissão negada";
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(50deg , gray, gray); /* Cor de fundo mais clara */
}

div {
    background-color: #fff; /* Fundo branco */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 30px; /* Reduzindo o espaço interno */
    border-radius: 5px; /* Borda mais arredondada */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    color: #333; /* Cor do texto mais escuro */
    max-width: 400px; /* Largura máxima para melhor legibilidade */
}

input {
    padding: 10px;
    border: 1px solid #ccc; /* Borda cinza */
    outline: none;
    font-size: 14px; /* Tamanho da fonte reduzido */
    margin-bottom: 10px; /* Espaçamento inferior entre os inputs */
    width: calc(100% - 22px); /* Largura total menos a largura da borda */
}

button {
    background-color: #007bff; /* Cor de fundo azul */
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 5px;
    color: #fff;
    font-size: 14px; /* Tamanho da fonte reduzido */
    cursor: pointer; /* Mostrar cursor de link */
}

button:hover {
    background-color: #0056b3; /* Cor de fundo azul mais escura no hover */
}

    </style>
</head>
<body>
</body>
<body>
    <div>
        <h1>login</h1>
        <form action="" method="POST">
            <input name="user_id" type="text" placeholder="user_id">
            <br><br>
            <input name="senha" type="password" placeholder="Senha">
            <br><br>
            <button type="submit">Entrar</button>
        </form>
        <br><br>
        <a href="http://localhost/tela_cadastro.php">Cadastre-se</a>
    </div>
</body>
</html>
