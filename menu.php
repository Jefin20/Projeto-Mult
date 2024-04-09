<!DOCTYPE html>
<html>
<head>
    <title>Menu de Opções</title>
    <style>
    /* Estilos para o menu */
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(45deg, gray, gray);
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 70px; /* Ajusta o espaçamento entre o topo e o título */
    font-size: 50px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    text-align: center; /* Centraliza os itens da lista */
}

li {
    margin-bottom: 10px; /* Ajusta o espaçamento entre os itens da lista */
}

a {
    text-decoration: none;
    color: #333;
    display: inline-block;
    padding: 15px 30px; /* Aumenta o espaço interno do link */
    background-color: #ffffff;
    border: 2px solid #cccccc;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: darkslategray; /* Cor de fundo azul ao passar o mouse */
    color: #fff; /* Cor do texto branco ao passar o mouse */
}

    </style>
</head>
<body>
    <h1>MENU</h1>
    <ul>
        <?php
        // Verifica se o usuário está logado e é o usuário "x"
        session_start();
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Admin') {
            echo '<li><a href="relatorio.php">Relatório de Cadastro</a></li>';
            echo '<br><br>';
        }
        ?>
        <li><a href="relatorio.php">Relatório</a></li>
        <br><br>
        <li><a href="liberacao.php">Liberação de cadastro</a></li>
        <br><br>
        <li><a href="https://drive.google.com/drive/folders/1oclvwcXtJzh3oHCHwd4txjP9L2-KM_rz?usp=sharing">Drive</a></li>
        <br><br>
        <li><a href="logout.php">Sair</a></li> <!-- Adiciona o link para a página de logout -->
    </ul>
</body>
</html>
