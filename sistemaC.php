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
    <title>Speed - Página cliente</title>
    <link rel="icon" href="img/logoSpeed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sistemas.css">
</head>
<body>
    <header>
        <div id="navbar">
            <!--LISTA DE MECANICOS E LISTA DE PEÇAS-->
            <a href="#"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
            <a href="sair.php"><button id="sairSistema">SAIR</button></a>
        </div>
    </header>

    <div id="list">
            <div id="list-sub"><a href="listM.php"><img src="img/capacete-de-seguranca (1).png" width="30px"></a>
            <p>Mecânicos</p></div>
            <div id="list-sub"><a href="listP.php"><img src="img/ferramenta-de-reparacao.png" width="30px"></a>
            <p>Peças</p></div>
    </div>

    <main>

        <div id="container-busca">
        <h3>PESQUISE MECÂNICOS PROXIMO:</h3>
        <form action="" method="POST">
            <input type="text" name="bairro" placeholder="Digite o bairro">
            <input type="text" name="cidade" placeholder="Digite a cidade">
            <input type="submit" value="Buscar Mecânicos">
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
                    <th scope="col">Nome</th>
                    <th scope="col">Solicitar serviço</th>
                </tr>
            </thead>
            <tbody>
        <?php
        include_once('config.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (!empty($_POST['bairro']) && !empty($_POST['cidade'])) {
                // Obtém os valores do formulário
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
        
                // Consulta para encontrar a localização pelo bairro e cidade
                $sqlLocalizacao = "SELECT idLocalizacao FROM Localizacao WHERE Bairro = '$bairro' AND Cidade = '$cidade'";
                $resultLocalizacao = $conn->query($sqlLocalizacao);
        
                if ($resultLocalizacao->num_rows > 0) {
                    // Obtem o ID da localizacao
                    $rowLocalizacao = $resultLocalizacao->fetch_assoc();
                    $idLocalizacao = $rowLocalizacao['idLocalizacao'];
        
                    // Consulta para buscar os mecânicos na localização encontrada
                    $sqlMecanicos = "SELECT * FROM Mecanicos WHERE idLocalizacao = '$idLocalizacao'";
                    $resultMecanicos = $conn->query($sqlMecanicos);
        
                    if ($resultMecanicos->num_rows > 0) {
                        // Exibe os resultados
                        while($row = $resultMecanicos->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>". $row["idMecanico"]."</td>";
                            echo "<td>".$row["nome"]."</td>";
                            echo "<td><a class='btn btn-sm btn-primary' href='#' onclick='showModal(\"".$row["telefone"]."\")'>SOLICITAR</a></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "Nenhum mecânico encontrado no bairro ".$bairro." da cidade ".$cidade;
                    }
                } else {
                    echo "Localização não encontrada para o bairro ".$bairro." da cidade ".$cidade;
                }
            } else {
                echo "Por favor, preencha todos os campos do formulário.";
            }
        }

        ?>
</tbody>
</table>
</div>
</div>
        
        <!-- Modal -->
        <div id="myModal" class="modal">
        <!-- Conteúdo do Modal -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
        </div>



    </main>

    <script>
        // JavaScript para mostrar e esconder o modal
        function showModal(telefone) {
            var modal = document.getElementById("myModal");
            var modalContent = document.getElementById("modalContent");
            modal.style.display = "block";
            modalContent.innerHTML = "<p>ENTRE EM CONTATO E SOLICITE SEU SERVIÇO: TELEFONE - " + telefone + "</p>";
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

    </script>
</body>
</html>