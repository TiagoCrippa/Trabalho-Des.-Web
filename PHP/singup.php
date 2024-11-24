<!-- Pagina de Cadastro -->
<?php
include("conexao.php");

if (isset($_POST["email2"]) || isset($_POST["senha2"]) || isset($_POST["nome2"]) || isset($_POST["telefone"]) || isset($_POST["sexo"])) {
    if (strlen($_POST["nome2"]) == 0) { // Rogerio: se quantidade de caracteres em 'email' for 0, ou seja, vazio
        // echo "Prencha seu nome de usuário";
        echo "";
    } else if (strlen($_POST["email2"]) == 0) { // Rogerio: se quantidade de caracteres em 'senha' for 0, ou seja, vazio
        // echo "Preencha seu e-mail";
        echo "";
    } else if (strlen($_POST["senha2"]) == 0) {
        // echo "Preencha sua senha";
        echo "";
    } else if (strlen($_POST["telefone"]) == 0) {
        // echo "Preencha seu telefone";
        echo "";
    } else if (strlen($_POST["sexo"]) == 0) {
        // echo "Selecione um sexo";
        echo "";
    } else { // Rogerio: caso usuário tenha digitado 'email', 'senha', 'nome', 'telefone' e 'sexo'
        $email = $mysqli->real_escape_string($_POST["email2"]); // Rogerio: 'limpar' o email para evitar SQL Injection
        $senha = $mysqli->real_escape_string($_POST["senha2"]);
        $nome = $mysqli->real_escape_string($_POST["nome2"]);
        $telefone = $mysqli->real_escape_string($_POST["telefone"]);
        $sexo = $mysqli->real_escape_string($_POST["sexo"]);

        // Rogerio: consulta a database para ver se ja tem cadastro
        $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query_email = $mysqli->query($sql_email) or die("Falha na execução do código SQL: " . $mysqli->error);

        $sql_nome = "SELECT * FROM usuarios WHERE nome = '$nome'";
        $sql_query_nome = $mysqli->query($sql_nome) or die("Falha na execução do código SQL: " . $mysqli->error);

        $sql_telefone = "SELECT * FROM usuarios WHERE telefone = '$telefone'";
        $sql_query_telefone = $mysqli->query($sql_telefone) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade_email = $sql_query_email->num_rows;
        $quantidade_nome = $sql_query_nome->num_rows;
        $quantidade_telefone = $sql_query_telefone->num_rows;

        if ($quantidade_email > 0) { // Rogerio: se existir usario com o email
            echo "E-mail ja cadastrado<p><a href=\"index.php\">Entrar</a></p>";
        } else if ($quantidade_nome > 0) { // Rogerio: se existir usario com o nome
            // echo "Nome de usuário ja existe.";
        echo "";
        } else if ($quantidade_telefone > 0) { // Rogerio: se existir usuario com o telefone
            // echo "Telefone ja cadastrado";
        echo "";
        } else {
            $sql = "INSERT INTO usuarios (email, senha, nome, sexo, telefone) VALUES (?, ?, ?, ?, ?)"; // Rogerio: code SQL para inserção de dados na DB
            $stmt = $mysqli->prepare($sql); // Rogerio: prepara o statement

            // Rogerio: verificação se o statement foi preparado corretamente
            if ($stmt) {
                // Rogerio: bind dos parâmetros (associa as variáveis aos placeholders)
                $stmt->bind_param("sssss", $email, $senha, $nome, $sexo, $telefone);

                // Rogerio: execução da consulta e verificação de sucesso
                if ($stmt->execute()) {
                    echo
                    ("
                        <SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Dados inseridos com sucesso!');
                            window.location.href = '../PHP/index.php';
                        </SCRIPT>
                    ");
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
    <!-- <link rel="stylesheet" href="../CSS/js-styles.css"> -->
    <link rel="stylesheet" href="../CSS/caduserstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Irish+Grover&display=swap" rel="stylesheet">
    <script src="../JS/main.js"></script>
    <title>Cadastro</title>
</head>

<body>
    <form id="form" action="" method="POST" class="form_cad extensao_form_cad" onsubmit="return cadastraForm()">
        <h1>Cadastro</h1>
        <p class="ajuste_cadastro">
            <input type="text" id="name" name="nome2" class="inputs required cadastro_form"
                placeholder="Nome de Usuario">
            <!-- <span class="span-required">Nome deve ter no mínimo 3 caracteres</span> -->
        </p>
        <div class="show_span">
            <span id="erro_name" class="erro_cadForm"></span>
        </div>
        <p>
            <input type="text" id="email" name="email2" class="inputs required cadastro_form" placeholder="Email">
            <!-- <span class="span-required">Digite um email válido</span> -->
        </p>
        <div class="show_span">
            <span id="erro_email" class="erro_cadForm"></span>
        </div>
        <p>
            <input type="password" id="password" name="senha2" class="inputs required cadastro_form"
                placeholder="Senha">
            <!-- <span class="span-required">Digite uma senha com no mínimo 6 caracteres</span> -->
        </p>
        <div class="show_span">
            <span id="erro_password" class="erro_cadForm"></span>
        </div>
        <p>
            <input type="tel" id="phone" name="telefone" class="inputs required cadastro_form" placeholder="Telefone">
            <!-- <span class="span-required">Digite um numero de telefone válido</span> -->
        </p>
        <div class="show_span">
            <span id="erro_phone" class="erro_cadForm"></span>
        </div>
        <p class="container_genre">
            <label class="genre_label">Sexo:</label><br>

            <input type="radio" id="masculino" name="sexo" value="Masculino" class="genre">
            <label for="masculino">Masculino</label>

            <input type="radio" id="feminino" name="sexo" value="Feminino" class="genre">
            <label for="feminino">Feminino</label>

            <input type="radio" id="outro" name="sexo" value="Outro" class="genre">
            <label for="outro">Outro</label>
        </p>
        <div class="show_span">
            <span id="erro_genre" class="erro_cadForm"></span>
        </div>

        <p>
            <button type="submit" class="btn_cad">Cadastrar</button>
        </p>

        <p>
            <a href="../PHP/index.php">
                <img src="../assets/icons8-à-esquerda-dentro-de-um-círculo-30.png" alt="">
            </a>
        </p>
    </form>
</body>

</html>