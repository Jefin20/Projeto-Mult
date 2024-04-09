<!-- tela_cadastro.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro | GN</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="box">
        <form action="tela_cadastro.php" method="post">
            <fieldset>
                <legend><b> Cadastro de usuário </b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="user_id" id="user_id" class="inputUser" required>
                    <label for="user_id" class="labelInput">Crie seu usuário</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="inputUser" required>
                    <label for="confirmar_senha" class="labelInput">Confirmar Senha</label>
                </div>
                <br><br>
                <p>Genero:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br><br>
                <input type="radio" id="masculino" name="genero" value="masculino">
                <label for="masculino">Masculino</label>
                <br><br>
                <input type="radio" id="outro" name="genero" value="outro">
                <label for="outro">Outro</label>
                <br><br>
                <label for="Data_Nascimento"><b>Data de Nascimento</b>:</label>
                <input type="date" name="Data_Nascimento" id="Data_Nascimento" required>
                <div class="inputBox"></div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conecta ao banco de dados MySQL
        $servername = "localhost";
        $username = "id22009073_admin";
        $password = "Arroba34#";
        $database = "id22009073_cadastro_usuario";

        $mysqli = new mysqli($servername, $username, $password, $database);

        // Verifica a conexão
        if ($mysqli->connect_error) {
            die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
        }

        // Recupera os valores do formulário
        $nome = $_POST['nome'];
        $user_id = $_POST['user_id'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $genero = $_POST['genero'];
        $Data_Nascimento = $_POST['Data_Nascimento'];

        // Construindo a consulta SQL
        $sql = "INSERT INTO usuários (nome, user_id, telefone, senha, genero, Data_Nascimento) VALUES ";
        $sql .= "('$nome', '$user_id', '$telefone', '$senha', '$genero', '$Data_Nascimento')";

        // Executando a consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }

        // Fecha a conexão
        $conn->close();
    }
    ?>
</body>
</html>