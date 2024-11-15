<?php
include("protect.php"); // Rogerio: impede que usuario sem sessão ativa consigam acessar o painel.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    Bem vindo ao Painel, <?php echo $_SESSION["name"]; ?>

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body> 
</html>