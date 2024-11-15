<!-- Pagina de Cadastro -->

<?php
include("conexao.php");

if(isset($_POST["email2"]) || isset($_POST["senha2"]) || isset($_POST["nome2"])) {
    if(strlen($_POST["nome2"]) == 0) { // Rogerio: se quantidade de caracteres em 'email' for 0, ou seja, vazio
        echo "Prencha seu nome de usuário";
    } else if(strlen($_POST["email2"]) == 0){ // Rogerio: se quantidade de caracteres em 'senha' for 0, ou seja, vazio
        echo "Preencha seu e-mail";
    } else if(strlen($_POST["senha2"]) == 0) {
        echo "Preencha sua senha";
    } else { // Rogerio: caso usuário tenha digitado 'email', 'senha' e 'nome
        $email = $mysqli->real_escape_string($_POST["email2"]); // Rogerio: 'limpar' o email para evitar SQL Injection
        $senha = $mysqli->real_escape_string($_POST["senha2"]);
        $nome = $mysqli->real_escape_string($_POST["nome2"]);

        // Rogerio: consulta a database para ver se ja tem cadastro
        $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query_email = $mysqli->query($sql_email) or die("Falha na execução do código SQL: " . $mysqli->error);

        $sql_nome = "SELECT * FROM usuarios WHERE nome = '$nome'";
        $sql_query_nome = $mysqli->query($sql_nome) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade_email = $sql_query_email->num_rows;
        $quantidade_nome = $sql_query_nome->num_rows;

        if($quantidade_email > 0) { // Rogerio: se existir usario com o email
            echo "E-mail ja cadastrado<p><a href=\"index.php\">Entrar</a></p>";
        } else if($quantidade_nome > 0) { // Rogerio: se existir usario com o nome
            echo "Nome de usuário ja existe.";
        } else {
            $sql = "INSERT INTO usuarios (email, senha, nome) VALUES (?, ?, ?)"; // Rogerio: code SQL para inserção de dados na DB
            $stmt = $mysqli->prepare($sql); // Rogerio: prepara o statement

            // Rogerio: verificação se o statement foi preparado corretamente
            if ($stmt) {
                // Rogerio: bind dos parâmetros (associa as variáveis aos placeholders)
                $stmt->bind_param("sss", $email, $senha, $nome);

                // Rogerio: execução da consulta e verificação de sucesso
                if ($stmt->execute()) {
                    echo "Dados inseridos com sucesso!<p><a href=\"index.php\">Entrar</a></p>";
                } else {
                    echo "Erro ao inserir dados: " . $stmt->error;
                }

                // Rogerio: fecha o statement
                $stmt->close();
            } else {
                echo "Erro na preparação da consulta: " . $mysqli->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label>Nome de Usuario</label>
            <input type="text" name="nome2">
        </p>

        <p>
            <label>Email</label>
            <input type="text" name="email2">
        </p>

        <p>
            <label>Senha</label>
            <input type="password" name="senha2">
        </p>

        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
</body>
</html>