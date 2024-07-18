<?php
    include_once('config.php');

    $sqlP = "SELECT * FROM Pecas ORDER BY idPecas DESC";

    $resultP = $conn->query($sqlP);

    //print_r($resultM);

    $sqlF = "SELECT * FROM Fornecedores ORDER BY idFornecedor DESC";

    $resultF = $conn->query($sqlF);

    //print_r($resultL);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speed - Lista Mecânicos</title>
    <link rel="icon" href="img/logoSpeed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/list.css">
</head>
<body>
    <header>
        <div id="navbar">
            <a href="#"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
            <a href="sair.php"><button id="sairSistema">SAIR</button></a>
        </div>
    </header>

    <div id="lista">
            <div id="lista-sub"><a href="listF.php"><img src="img/homem-de-terno-e-gravata.png" width="30px"></a>
            <p>Fornecedores</p></div>
    </div>

    <main>
<div id="caixa-table">
<div class="m-6">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Preço</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Telefone</th>
            <th scope="col">Solicitar peça</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($pecData = mysqli_fetch_assoc($resultP)) {
            $fornData = mysqli_fetch_assoc($resultF);
            if ($fornData) {
                echo "<tr>";
                echo "<td>".$pecData['idPecas']."</td>";
                echo "<td>".$pecData['nome']."</td>";
                echo "<td>".$pecData['tipo']."</td>";
                echo "<td>".$pecData['preco']."</td>";
                echo "<td>".$fornData['nome']."</td>";
                echo "<td>".$fornData['telefone']."</td>";
                echo "<td><a class='btn btn-sm btn-primary' href='#' onclick='showModal(\"".$fornData['telefone']."\")'>COMPRAR</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</div>
</div>

<div id="myModal" class="modal">
        <!-- Conteúdo do Modal -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="modalContent"></div>
        </div>
        </div>

    </main>
    <script>
      const icon = document.getElementById('icon');
  const list = document.getElementById('list');

  icon.addEventListener('click', function() {
    list.classList.toggle('hidden');
  });
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