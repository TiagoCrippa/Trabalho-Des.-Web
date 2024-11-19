<!-- Pagina de Cadastro -->
<?php
include("conexao.php");

if(isset($_POST["email2"]) || isset($_POST["senha2"]) || isset($_POST["nome2"]) || isset($_POST["telefone"]) || isset($_POST["sexo"])) {
    if(strlen($_POST["nome2"]) == 0) { // Rogerio: se quantidade de caracteres em 'email' for 0, ou seja, vazio
        echo "Prencha seu nome de usuário";
    } else if(strlen($_POST["email2"]) == 0){ // Rogerio: se quantidade de caracteres em 'senha' for 0, ou seja, vazio
        echo "Preencha seu e-mail";
    } else if(strlen($_POST["senha2"]) == 0) {
        echo "Preencha sua senha";
    } else if(strlen($_POST["telefone"]) == 0) {
        echo "Preencha seu telefone";
    } else if(strlen($_POST["sexo"]) == 0) {
        echo "Selecione um sexo";
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

        if($quantidade_email > 0) { // Rogerio: se existir usario com o email
            echo "E-mail ja cadastrado<p><a href=\"index.php\">Entrar</a></p>";
        } else if($quantidade_nome > 0) { // Rogerio: se existir usario com o nome
            echo "Nome de usuário ja existe.";
        } else if($quantidade_telefone > 0) { // Rogerio: se existir usuario com o telefone
            echo "Telefone ja cadastrado";
        } else {
            $sql = "INSERT INTO usuarios (email, senha, nome, sexo, telefone) VALUES (?, ?, ?, ?, ?)"; // Rogerio: code SQL para inserção de dados na DB
            $stmt = $mysqli->prepare($sql); // Rogerio: prepara o statement

            // Rogerio: verificação se o statement foi preparado corretamente
            if ($stmt) {
                // Rogerio: bind dos parâmetros (associa as variáveis aos placeholders)
                $stmt->bind_param("sssss", $email, $senha, $nome, $sexo, $telefone);

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
    <link rel="stylesheet" href="../CSS/js-styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form id="form" action="" method="POST">
        <p>
            <input type="text" name="nome2" class="inputs required" placeholder="Nome de Usuario" oninput="validarNome()">
            <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
        </p>

        <p>
            <input type="text" name="email2" class=" inputs required" placeholder="Email" oninput="validarEmail()">
            <span class="span-required">Digite um email válido</span>
        </p>

        <p>
            <input type="password" name="senha2" class="inputs required" placeholder="Senha" oninput="validarSenha()">
            <span class="span-required">Digite uma senha com no mínimo 6 caracteres</span>
        </p>

        <p>
            <input type="tel" name="telefone" class="inputs required" placeholder="Telefone" oninput="validarTel()">
            <span class="span-required">Digite um numero de telefone válido</span>
        </p>

        <p>
            <label>Sexo:</label><br>

            <input type="radio" id="masculino" name="sexo" value="Masculino">
            <label for="masculino">Masculino</label>

            <input type="radio" id="feminino" name="sexo" value="Feminino">
            <label for="feminino">Feminino</label>

            <input type="radio" id="outro" name="sexo" value="Outro">
            <label for="outro">Outro</label>
        </p>

        <p>
            <button type="submit">Cadastrar</button>
        </p>

        <p>
            <button type="button" onclick="window.location.href='../HTML/index.html'">Voltar</button>
        </p>
    </form>
</body>
<script>
    const form = document.getElementById("form");
    const campos = document.querySelectorAll(".required"); // Rogerio: pega todos os elementos que tem a classe required
    const spans = document.querySelectorAll(".span-required");
    const radios = document.getElementsByName("sexo");
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\w+([-.]\w+)*$/; // Rogerio: regex para validação do e-mail
    const telRegex = /^\d{11}$/;

    form.addEventListener("submit", (event) => { // Rogerio: evento que verifica antes de enviar POST
        validarNome();
        validarEmail();
        validarSenha();
        validarTel();

        if (document.querySelectorAll('.span-required[style*="block"]').length === 0 && validarSexo()) { // Rogerio: se todas as validações passarem, o formulário pode ser enviado
            form.submit(); // Rogerio: envia o formulário
        } else {
            event.preventDefault(); // Rogerio: impede o envio do formulário
        }
    });

    function setError(index) {
        campos[index].style.border = "2px solid #e63636"; // Rogerio: adiciona a borda ao campo invalido
        spans[index].style.display = "block"; // Rogerio: se erro, mostra o texto informando
    }

    function removeError(index) {
        campos[index].style.border = ""; // Rogerio: retira a borda ao campo valido
        spans[index].style.display = "none"; // Rogerio: apaga o texto do erro     
    }

    function validarNome() {
        if(campos[0].value.length < 3) { // Rogerio: pega o valor do primeiro campo(nome) e ve se é menor que 3
            setError(0);
        } else {
            removeError(0);
        }
    }

    function validarEmail() {
        if(emailRegex.test(campos[1].value)) { // Rogerio: valida o email por padrão regex
            removeError(1);
        } else {
            setError(1);
        }
    }

    function validarSenha() {
        if(campos[2].value.length < 6) { // Rogerio: pega o valor do campo(senha) e ve se é menor que 6
            setError(2);
        } else {
            removeError(2);
        }
    }

    function validarTel() {
        if(telRegex.test(campos[3].value)) {
            removeError(3);
        } else {
            setError(3);
        }
    }

    function validarSexo() {
        let selecionado = false; 
        for(const radio of radios) { // Rogerio: verifica se existe alguma opção selecionado
            if(radio.checked) {
                selecionado = true;
                break;
            }
        }
        if (!selecionado) {
            alert("Por favor, selecione uma opção de sexo.");
            return false;
        } else {
            return true;
        }
    }
</script>
</html>