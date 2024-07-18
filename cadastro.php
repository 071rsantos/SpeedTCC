<?php

if(isset($_POST['submit'])){
    //print_r($_POST['nome']);
    //print_r('<br>');
    //print_r($_POST['email']);
    //print_r('<br>');
    //print_r($_POST['telefone']);
    //print_r('<br>');
    //print_r($_POST['user']);
    //print_r('<br>');
    //print_r($_POST['data_nascimento']);
    //print_r('<br>');
    //print_r($_POST['cidade']);
    //print_r('<br>');
    //print_r($_POST['estado']);
    //print_r('<br>');
    //print_r($_POST['endereco']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tel = $_POST['telefone'];
    $tipo = $_POST['user'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];

    $resultLoc = mysqli_query($conn, "INSERT INTO Localizacao(Cidade, Estado, Bairro, Rua, Complemento, Numero) VALUES ('$cidade', '$estado', '$bairro', '$rua', '$complemento', '$numero')");

// Obter o ID da localização inserida
    $idLocalizacao = mysqli_insert_id($conn);


        if ($tipo == 'cliente') {
        $result = mysqli_query($conn, "INSERT INTO Cliente(Nome, cpf, email, senha, telefone, idLocalizacao) VALUES ('$nome', '$cpf', '$email', '$senha', '$tel', '$idLocalizacao')");
    } elseif ($tipo == 'mecanico') {
        $result = mysqli_query($conn, "INSERT INTO Mecanicos(Nome, cnpj, email, senha, telefone, idLocalizacao) VALUES ('$nome', '$cpf', '$email', '$senha', '$tel', '$idLocalizacao')");
    } elseif ($tipo == 'fornecedor') {
        $result = mysqli_query($conn, "INSERT INTO Fornecedores(Nome, cnpj, email, senha, telefone, idLocalizacao) VALUES ('$nome', '$cpf', '$email', '$senha', '$tel', '$idLocalizacao')");
    }
    

    header('Location: login.php');

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se SPEED</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="icon" href="img/logoSpeed.png">
</head>
<body>

    <header>
        <div id="navbar">
            <a href="login.php"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
        </div>
    </header>

    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CNPJ/CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Tipo de usuário:</p>
                <input type="radio" id="fornecedor" name="user" value="fornecedor" required>
                <label for="fornecedor">Fornecedor</label>
                <br>
                <input type="radio" id="mecanico" name="user" value="mecanico" required>
                <label for="mecanico">Mecânico</label>
                <br>
                <input type="radio" id="cliente" name="user" value="cliente" required>
                <label for="cliente">Cliente</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="rua" id="rua" class="inputUser" required>
                    <label for="rua" class="labelInput">Rua</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" required>
                    <label for="complemento" class="labelInput">Complemento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="numero" id="numero" class="inputUser" required>
                    <label for="numero" class="labelInput">Numero</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <script>
        const icon = document.getElementById('icon');
  const list = document.getElementById('list');

  icon.addEventListener('click', function() {
    list.classList.toggle('hidden');
  });
    </script>
</body>
</html>