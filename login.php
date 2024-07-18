<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPEED</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="img/logoSpeed.png">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <header>
        <div id="navbar">
            <a href="#"><img src="img/logoSpeed.png" alt="logoSpeed"></a>
        </div>
    </header>
<br>
    <main>
        <div id="containerLogin">
            <div id="variLogo"><img src="img/logoSpeed.png"><h1>SPEED</h1><img src="img/logoSpeed.png"></div>
            <form action="test.php" method="POST" id="formLogin">
                    <input type="text" id="input" name="email" placeholder="Email">
                    <input type="password" name="senha" id="input" placeholder="Senha">
                    <input class="inpButton" name="submit" type="submit" value="ENTRAR">
                    <p>Ainda não é cadastrado? <a href="cadastro.php">CADASTRE-SE</a></p>
            </form>
        </div>
        <br>
        <br>
        <a href="cadastro.php"><button id="btnCad">CADASTRE-SE</button></a>
        <br>
        <br>
        <div id="container-sbn">
            <div id="sobre-nosFOTO"><img src="img/logoSpeed.png"></div>
            <div id="sobre-nos">
              <h3>GRUPO SPEED</h3>
              <p>Somos um grupo de estudantes da escola técnica Senai Dendezeiros, formando em Desenvolvimento de sistemas.<br>A ideia do projeto Speed surgiu do tema para o nosso trabalho de conclusão de curso. Enxergamos a necessidade do mercado em unir e facilitar o relacionamento entre, clientes, mecânicos e fornecedores, trabalhamos essa ideia e decidimos criar uma rede social que aproxime, facilite a venda, a compra e ajude nossos usuários.
              </p>
            </div>
        </div>
    </main>

    <script>const icon = document.getElementById('icon');
  const list = document.getElementById('list');

  icon.addEventListener('click', function() {
    list.classList.toggle('hidden');
  });</script>
</body>
</html>