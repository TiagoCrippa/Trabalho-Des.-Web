<!-- Faz o logout da sessão e redireciona o usuario, não visivel para o usuario final -->
<?php
if(!isset($_SESSION)) {
    session_start();
}
session_destroy(); // Rogerio: isso destroi todas as variavés da sessão
header("Location: index.php") // Rogerio: redireciona para a página de login
?>