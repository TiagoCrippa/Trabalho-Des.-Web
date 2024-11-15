<!-- Tela de Login -->
<?php
include("conexao.php");

if(isset($_POST["email"]) || isset($_POST["senha"])) { // Rogerio: 'isset' verifica se 'existe'
    if(strlen($_POST["email"]) == 0) { // Rogerio: se quantidade de caracteres em 'email' for 0, ou seja, vazio
        echo "Preencha seu e-mail";
    } else if(strlen($_POST["senha"]) == 0){ // Rogerio: se quantidade de caracteres em 'senha' for 0, ou seja, vazio
        echo "Preencha sua senha";
    } else { // Rogerio: caso usuário tenha digitado 'email' e 'senha'
        $email = $mysqli->real_escape_string($_POST["email"]); // Rogerio: 'limpar' o email para evitar SQL Injection
        $senha = $mysqli->real_escape_string($_POST["senha"]);
        
        // Rogerio: consulta a database
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // Rogerio: selecione tudo de usuarios onde email = $email e senha = $senha
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows; // Rogerio: armazena a quantidade de linhas (usuarios) que o SELECT retornou

        if($quantidade == 1) { // Rogerio: se apenas um usuario

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) { // Rogerio: se não existir uma sessão
                session_start(); // Rogerio: inicia a sessão
            }

            $_SESSION["id"] = $usuario["id"]; // Rogerio: passa as variavéis para a sessão
            $_SESSION["name"] = $usuario["nome"];

            header("Location: painel.php"); // Rogerio: redirecionar o usuario logado

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

 <!DOCTYPE html>
 <html lang="pt-BR">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 </head>
 <body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST"> <!-- Rogerio: action em branco para que os dados sejam enviados para a própria index.php -->
        <p>
            <label>Email</label>
            <input type="text" name="email">
        </p>

        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        
        <p>
            <button type="submit">Entrar</button>
        </p>

        <p>
            <button type="button" onclick="window.location.href='./singup.php'">Cadastrar</button>
        </p>
    </form>
 </body>
 </html>