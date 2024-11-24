<!-- Tela de Login -->
<?php
include("conexao.php");

if (isset($_POST["email"]) || isset($_POST["senha"])) { // Rogerio: 'isset' verifica se 'existe'
    if (strlen($_POST["email"]) == 0) { // Rogerio: se quantidade de caracteres em 'email' for 0, ou seja, vazio
        echo "Preencha seu e-mail";
    } else if (strlen($_POST["senha"]) == 0) { // Rogerio: se quantidade de caracteres em 'senha' for 0, ou seja, vazio
        echo "Preencha sua senha";
    } else { // Rogerio: caso usuário tenha digitado 'email' e 'senha'
        $email = $mysqli->real_escape_string($_POST["email"]); // Rogerio: 'limpar' o email para evitar SQL Injection
        $senha = $mysqli->real_escape_string($_POST["senha"]);

        // Rogerio: consulta a database
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // Rogerio: selecione tudo de usuarios onde email = $email e senha = $senha
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows; // Rogerio: armazena a quantidade de linhas (usuarios) que o SELECT retornou

        if ($quantidade == 1) { // Rogerio: se apenas um usuario

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) { // Rogerio: se não existir uma sessão
                session_start(); // Rogerio: inicia a sessão
            }

            $_SESSION["id"] = $usuario["id"]; // Rogerio: passa as variavéis para a sessão
            $_SESSION["name"] = $usuario["nome"];
            $_SESSION["email"] = $usuario["email"];
            $_SESSION["telefone"] = $usuario["telefone"];
            $_SESSION["sexo"] = $usuario["sexo"];
            $_SESSION["senha"] = $usuario["senha"];

            header("Location: painel.php"); // Rogerio: redirecionar o usuario logado

        } else {
            // echo "Falha ao logar! E-mail ou senha incorretos";
            echo 
            ("
                <SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Falha ao logar! E-mail ou senha incorretos!');
                </SCRIPT>
            ");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/caduserstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Irish+Grover&display=swap" rel="stylesheet">
    <script src="../JS/main.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="background-container"></div>
    <div class="content-container">
        <form action="" method="POST" class="form_cad" onsubmit="return validaForm()"> <!-- Rogerio: action em branco para que os dados sejam enviados para a própria index.php -->
            <h1>Acesse sua conta</h1>
            <p class="user_login">
                <img src="../assets/icons8-user-30.png" alt="" height="30pxh">
                <input type="text" name="email" placeholder="E-mail" id="username">
            </p>
            <div class="show_span">
                <span id="erro_username" class="erro_cadForm"></span>
            </div>
            <p class="password_login">
                <img src="../assets/icons8-password-30.png" alt="" height="30px">
                <input type="password" name="senha" placeholder="Senha" id="password">
            <div class="show_span">
                <span id="erro_password" class="erro_cadForm"></span>
            </div>
            </p>

            <p>
                <button type="submit">Entrar</button>
            </p>

            <p class="form_paragrafo">
                Ainda não tem cadastro? Clique
                <a href="../PHP/singup.php" onclick="window.location.href='./singup.php'" type="button">Aqui!</a>
                <!-- <button type="button" onclick="window.location.href='./singup.php'">Cadastrar</button> -->
            </p>

            <p class="voltar">
                <a href="../HTML/index.html">
                    <img src="../assets/icons8-à-esquerda-dentro-de-um-círculo-30.png" alt="">
                </a>
                <!-- <button type="button" onclick="window.location.href='../HTML/index.html'">Voltar</button> -->
            </p>
        </form>
    </div>
</body>

</html>