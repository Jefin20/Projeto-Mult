
<?php
// Defina suas credenciais de conexão com o banco de dados
        $servername = "localhost";
        $username = "id22009073_admin";
        $password = "Arroba34#";
        $database = "id22009073_cadastro_usuario";
// Crie uma conexão com o banco de dados
$mysqli = new mysqli($servername, $username, $password, $database);

// Verifique a conexão
if ($mysqli->connect_error) {
    die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
}
?>
