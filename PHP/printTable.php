<?php
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/mainstyle.css">
    <title>Imprimir Tabela DB</title>
</head>

<body class="container_printTable">
    <h2>Tabela Usuarios</h2>
    <form action="" method="POST">
        <button type="submit" name="showdata" value="enviar">Mostrar Dados</button>
        </br></br>
    </form>
</body>

</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['showdata'])) {
    echo
    '<div class="full_container_table">
        <table border=1 class="container_table">
        <tr>
        <th>Id</th>
        <th>E-mail</th>
        <th>Senha</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Telefone</th>
        </tr>';

    $connection = mysqli_connect($host, $usuario, $senha, $database);
    $consult = "SELECT * FROM usuarios";
    $consultdata = mysqli_query($connection, $consult);

    while ($linha = mysqli_fetch_assoc($consultdata)) {
        echo '<tr><td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['email'] . '</td>';
        echo '<td>' . $linha['senha'] . '</td>';
        echo '<td>' . $linha['nome'] . '</td>';
        echo '<td>' . $linha['sexo'] . '</td>';
        echo '<td>' . $linha['telefone'] . '</td></tr>';
    }
    echo
    '   </table>
        <button class="btn_voltar_painel"><a href="../PHP/painel.php">Voltar<a></button>
    </div>';
}
?>