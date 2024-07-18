<?php
    include_once('config.php');

    $sqlM = "SELECT * FROM Mecanicos ORDER BY idMecanico DESC";

    $resultM = $conn->query($sqlM);

    //print_r($resultM);

    $sqlL = "SELECT * FROM Localizacao ORDER BY idlocalizacao DESC";

    $resultL = $conn->query($sqlL);

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
            <div id="lista-sub"><a href="listP.php"><img src="img/ferramenta-de-reparacao.png" width="30px"></a>
            <p>Peças</p></div>
    </div>

    <main>
<div id="caixa-table">
<div class="m-6">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Rua</th>
            <th scope="col">Bairro</th>
            <th scope="col">Número</th>
            <th scope="col">Solicitar serviço</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($mecData = mysqli_fetch_assoc($resultM)) {
            $localData = mysqli_fetch_assoc($resultL);

            $telefone = isset($mecData['telefone']) ? $mecData['telefone'] : ""; // Verifica se o telefone está definido

            if ($localData) {
                echo "<tr>";
                echo "<td>".$mecData['idMecanico']."</td>";
                echo "<td>".$mecData['nome']."</td>";
                echo "<td>".$mecData['email']."</td>";
                echo "<td>".$mecData['telefone']."</td>";
                echo "<td>".$localData['Cidade']."</td>";
                echo "<td>".$localData['Estado']."</td>";
                echo "<td>".$localData['Rua']."</td>";
                echo "<td>".$localData['Bairro']."</td>";
                echo "<td>".$localData['Numero']."</td>";
                echo "<td><a class='btn btn-sm btn-primary' href='#' onclick='showModal(\"".$telefone."\")'>ENTRE EM CONTATO</a></td>";
                echo "</tr>";
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