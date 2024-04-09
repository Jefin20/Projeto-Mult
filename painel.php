<?php

if (!isset($_SESSION)) {
    session_start();
}

// Verificar se o usuário é "Admin"
$usuario_Admin = ($_SESSION['nome'] === 'Admin');

// Local de perguntas
$perguntas = array(
    "Qual é a sua cor favorita?",
    "Qual é o seu animal favorito?",
    "Qual é o seu hobby preferido?",
    "Qual é o seu filme favorito?",
    "Qual é o seu lugar favorito para viajar?",

);

// Selecionar uma pergunta aleatória
$pergunta_aleatoria = $perguntas[array_rand($perguntas)];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, gray, gray);
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        input[type="text"] {
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 300px;
        }

        .btn {
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove o sublinhado do link */
        }

        .btn:hover {
            background-color: darkslategray ;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bem Vindo, <?php echo $_SESSION['nome']; ?></h1>

    <p>Pergunta: <?php echo $pergunta_aleatoria; ?></p>

    <form id="formResposta" action="processar_resposta.php" method="POST">
        <input type="text" name="resposta" id="resposta" placeholder="Digite sua resposta..."
                oninput="checkInput()">
        <br><br>
        <?php if ($usuario_Admin): ?>
            <a href="menu.php" class="btn" id="btnEnviar" style="display: none;">Enviar Resposta</a>
        <?php else: ?>
            <a href="https://drive.google.com/drive/folders/1oclvwcXtJzh3oHCHwd4txjP9L2-KM_rz?usp=sharing"
                class="btn" id="btnEnviar">Enviar Resposta</a>
        <?php endif; ?>
    </form>

    <p><a href="logout.php">Sair</a></p>
</div>

<script>
    function checkInput() {
        var respostaInput = document.getElementById('resposta');
        var btnEnviar = document.getElementById('btnEnviar');

        // Habilitar o botão de enviar e mostrar o link se o campo de resposta não estiver vazio
        if (respostaInput.value.trim() !== '') {
            btnEnviar.style.display = 'inline-block';
        } else {
            btnEnviar.style.display = 'none';
        }
    }
</script>
</body>
</html>

<script>
    function checkInput() {
        var respostaInput = document.getElementById('resposta');
        var btnEnviar = document.getElementById('btnEnviar');

        // Habilitar o botão de enviar e mostrar o link se o campo de resposta não estiver vazio
        if (respostaInput.value.trim() !== '') {
            btnEnviar.style.display = 'inline-block';
        } else {
            btnEnviar.style.display = 'none';
        }
    }
</script>
</body>
</html>
