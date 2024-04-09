<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "Admin";
$password = "Arroba 34";
$dbname = "cadastro_usuário";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Verificar se os campos do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['liberarAcesso']) && isset($_POST['username'])) {
    $selectedUserId = $_POST['username'];
    $liberarAcesso = $_POST['liberarAcesso'];

    // Atualiza o valor de permissao_login para o usuário selecionado
    $sql_update = "UPDATE `usuários` SET `permissao_login` = $liberarAcesso WHERE `user_id`='$selectedUserId'";
    if ($mysqli->query($sql_update) === TRUE) {
        if($liberarAcesso == 1) {
            $_SESSION['success'] = "Acesso liberado para o usuário $selectedUserId.";
        } else {
            $_SESSION['success'] = "Acesso removido para o usuário $selectedUserId.";
        }
    } else {
        $_SESSION['error'] = "Erro ao atualizar o acesso do usuário.";
    }
    header("Location: login.php"); // Redireciona de volta para a página de login
    exit(); // Termina o script após o redirecionamento
}

// Consulta o banco de dados para recuperar todos os usuários
$sql_select_users = "SELECT * FROM `usuários`";
$result_users = $mysqli->query($sql_select_users);
$usuarios = array();
if ($result_users && $result_users->num_rows > 0) {
    // Os resultados da consulta estão disponíveis, atribua-os à variável $usuarios
    while($row = $result_users->fetch_assoc()) {
        $usuarios[] = $row['user_id'];
    }
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Usuários</title>
    <style>
        /* Estilos para o formulário de login */
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(45deg, gray, gray);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    width: 300px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.error-message {
    color: #ff0000;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Relatório de Usuários</h2>
        <?php
        // Exibe mensagens de sucesso ou erro, se houver
        if (isset($_SESSION['success'])) {
            echo '<p class="success-message">' . $_SESSION['success'] . '</p>';
            unset($_SESSION['success']); // Limpa a mensagem de sucesso da sessão
        }
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Limpa a mensagem de erro da sessão
        }
        ?>
        <form action="liberacao.php" method="POST">
            <label for="username">Selecione o usuário:</label>
            <br>
            <select id="username" name="username" required>
                <br><br>
                <option value="">Selecione...</option>
                <br><br>
                <?php
                // Verifique se $usuarios está definido antes de iterar sobre ele
                if(isset($usuarios)) {
                    foreach($usuarios as $usuario) {
                        echo '<option value="'.$usuario.'">'.$usuario.'</option>';
                    }
                }
                ?>
            </select>
            <label for="liberarAcesso">Liberar Acesso:</label>
            <select id="liberarAcesso" name="liberarAcesso" required>
                <br>
                <option value="0">Não</option>
                <br><br>
                <option value="1">Sim</option>
                <br><br>
            </select>
            <br><br>
            <button type="submit">Atualizar Acesso</button>
        </form>
    </div>
</body>
</html>
