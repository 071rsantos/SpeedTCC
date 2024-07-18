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
    <title>Speed - Página Mecanico</title>
    <link rel="icon" href="img/logoSpeed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sistemas.css">
</head>
<body>
    <header>
        <div id="navbar">
            <!--LISTA DE PEÇAS E FORNECEDORES-->
            <a href="#"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
            <a href="sair.php"><button id="sairSistema">SAIR</button></a>
        </div>
    </header>

    <div id="list">
            <div id="list-sub"><a href="listP.php"><img src="img/ferramenta-de-reparacao.png" width="30px"></a>
            <p>Peças</p></div>
            <div id="list-sub"><a href="listF.php"><img src="img/homem-de-terno-e-gravata.png" width="30px"></a>
            <p>Fornecedores</p></div>
    </div>

    <main>

        <div id="container-busca">
        <h3>BUSCA DE PEÇAS</h3>
        <hr>
        <!-- Formulário para buscar peças -->
        <form action="" method="POST">
            <input type="text" name="tipo" placeholder="Digite o tipo da peça">
            <input type="submit" value="Buscar Peças">
        </form>
        </div>
        <br>
        <br>
        <div id="caixa-table">
            <div class="m-6">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Avaliação</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Solicitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once('config.php');
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!empty($_POST['tipo'])) {
                                $tipo = $_POST['tipo'];

                                // Consulta para buscar as peças pelo tipo
                                $sqlPecas = "SELECT * FROM Pecas WHERE tipo LIKE '%$tipo%'";
                                $resultPecas = $conn->query($sqlPecas);

                                if ($resultPecas->num_rows > 0) {
                                    while ($row = $resultPecas->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["idPecas"] . "</td>";
                                        echo "<td>" . $row["tipo"] . "</td>";
                                        echo "<td>" . $row["nome"] . "</td>";
                                        echo "<td>" . $row["avaliacao"] . "</td>";
                                        echo "<td>R$ " . number_format($row["preco"], 2, ',', '.') . "</td>";
                                        echo "<td><a class='btn btn-sm btn-primary' href='listP.php'>SOLICITAR</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Nenhuma peça encontrada com o tipo: " . $tipo;
                                }
                            } else {
                                echo "Por favor, preencha o campo do tipo da peça.";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <script >
        const icon = document.getElementById('icon');
  const list = document.getElementById('list');

  icon.addEventListener('click', function() {
    list.classList.toggle('hidden');
  });
    </script>
</body>
</html>