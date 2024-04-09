<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Cadastro</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, gray, gray) ;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        }

        th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        }

        th {
        background-color: #f2f2f2;
        color: #333;
        }

        tr:hover {
        background-color: #f5f5f5;
        }




    </style>
</head>
<body>

<?php


// Conectar ao banco de dados MySQL
$servername = "localhost";
        $username = "id22009073_admin";
        $password = "Arroba34#";
        $database = "id22009073_cadastro_usuario";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para selecionar todos os dados da tabela de cadastro
$sql = "SELECT * FROM usuários";
$result = $conn->query($sql);

// Exibir os dados em uma tabela HTML
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Usuário</th><th>Telefone</th><th>Genero</th><th>Data de Nascimento</th><th>contador_login</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nome"] . "</td>";
    echo "<td>" . $row["user_id"] . "</td>";
    echo "<td>" . $row["telefone"] . "</td>";
    echo "<td>" . $row["genero"] . "</td>";
    echo "<td>" . $row["Data_Nascimento"] . "</td>";
    echo "<td>" . $row["contador_login"] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fechar conexão
$conn->close();
?>


</body>
</html>


