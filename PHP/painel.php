<?php
include("protect.php"); // Rogerio: impede que usuario sem sessão ativa consigam acessar o painel.php
include("conexao.php");
?>
<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/mainstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário</title>
</head>
<body class="perfilbody">
    <div class="sidebar">
        <a href="../HTML/index.html">
            <button class="btn">
                <span><img src="../assets/house.svg" alt=""></span> <!-- Rogerio: Ph = placeholder -->
                <span class="texto">HOME</span>
            </button>
        </a>
        <a href="../PHP/painel.php">
            <button class="btn">
                <span><img src="../assets/person.svg" alt=""></span>
                <span class="texto">PERFIL</span>
            </button>
        </a>
        <a href="../PHP/logout.php">
            <button class="btn">
                <span><img src="../assets/box-arrow-left.svg" alt=""></span>
                <span class="texto">SAIR</span>
            </button>
        </a>
        <a href="../PHP/printTable.php">
            <button class="btn">
                <span><img src="../assets/database.svg" alt=""></span>
                <span class="texto">IMPRIMIR DB</span>
            </button>
        </a>
    </div>

    <div class="game_container_text">
        <h2 class="game_container_h2">PERFIL DE USUÁRIO</h2>
    </div>

    <div class="cabecalho">
        <br>
        <img class="avatar" src="../assets/avatarprofile.jpg" alt="Avatar"> <!-- Foto de Perfil -->
    </div>

    <div class="detalhes">
        <h1>Detalhes</h1>
            <span class="negrito">Nome: </span> <p><?php echo $_SESSION["name"];?></p>
            <span class="negrito">Email: </span> <p><?php echo $_SESSION["email"];?></p>
            <span class="negrito">Telefone: </span> </p><?php echo $_SESSION["telefone"];?></p>
            <span class="negrito">Sexo: </span> <p><?php echo $_SESSION["sexo"];?></p>
            <span class="negrito">Senha: </span> <p><?php echo $_SESSION["senha"];?></p>
    </div>
</body> 
</html>