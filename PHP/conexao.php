<!-- Rogerio: Este aquivo é apenas uma referencia que faz a conexão com o banco de dados, ele não será apresentado para o usuario final -->
<?php
$usuario = "root";
$senha = "";
$database = "login-web-marvscap";
$host = "localhost";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) { // Rogerio: se erro na conexão com banco de dados = mata, para, termina
    die("Falha ao conectar ao banco de dados: ". mysqli->error);
}
?>