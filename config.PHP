
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Conexão PHP com Banco de Dados</title>
</head>
<body>


\\!-- tela_cadastro.php
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "id22009073_admin";
$password = "Arroba34#";
$database = "id22009073_cadastro_usuario";


$mysqli = new mysqli($servername, $username, $password, $database);
// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}
else{
    die("Conexao efetuada com sucesso".$mysqli->connect_error);
}

?>
