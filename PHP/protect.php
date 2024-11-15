<!-- Rogerio: impede que usuario sem sessão ativa consigam acessar o painel.php, não visivel para o usuario final -->
<?php
if(!isset($_SESSION)) { // Rogerio: inicia a sessão
    session_start();
}

if(!isset($_SESSION["id"])) { // Rogerio: se nao estiver logado
    die("Você não pode acessar esta página.<p><a href=\"index.php\">Entrar</a></p>");
}
?>