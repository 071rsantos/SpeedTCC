<?php
    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speed - Página Fornecedor</title>
    <link rel="icon" href="img/logoSpeed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/sistemas.css">
</head>
<body>
    <header>
        <div id="navbar">
            <a href="#"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
            <a href="sair.php"><button id="sairSistema">SAIR</button></a>
        </div>
    </header>

    <main>
        
        <div id="container-busca">
            <h3>Cadastro de Peças</h3>
            <hr>
                <form action="sistemaF.php" method="POST">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" required><br><br>

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br><br>

                    <label for="avaliacao">Avaliação:</label>
                    <input type="number" id="avaliacao" name="avaliacao" min="1" max="5"><br><br>

                    <label for="preco">Preço:</label>
                    <input type="number" id="preco" name="preco" step="0.01" required><br><br>

                    <input type="submit" value="Cadastrar Peça">
                </form>
        </div>
            <?php
            // Inclui o arquivo de configuração do banco de dados
            include_once('config.php');

            // Verifica se os dados foram enviados via POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtém os dados do formulário
                $tipo = $_POST["tipo"];
                $nome = $_POST["nome"];
                $avaliacao = isset($_POST["avaliacao"]) ? $_POST["avaliacao"] : null;
                $preco = $_POST["preco"];

                // Prepara a query SQL para inserção de dados na tabela
                $sql = "INSERT INTO Pecas (tipo, nome, avaliacao, preco) VALUES ('$tipo', '$nome', $avaliacao, $preco)";

                // Executa a query e verifica se a inserção foi bem-sucedida
                if ($conn->query($sql) === TRUE) {
                    echo "Peça cadastrada com sucesso!";
                } else {
                    echo "Erro ao cadastrar peça: " . $conn->error;
                }
            }
            ?>

    </main>
</body>
</html>