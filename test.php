<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta preparada para Cliente
    $sqlC = "SELECT * FROM Cliente WHERE email = ? and senha = ?";
    $stmtC = $conn->prepare($sqlC);
    $stmtC->bind_param("ss", $email, $senha);
    $stmtC->execute();
    $resultC = $stmtC->get_result();

    if(mysqli_num_rows($resultC) > 0){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: sistemaC.php");
        exit(); // Termina o script após o redirecionamento
    }

    // Consulta preparada para Mecanicos
    $sqlM = "SELECT * FROM Mecanicos WHERE email = ? and senha = ?";
    $stmtM = $conn->prepare($sqlM);
    $stmtM->bind_param("ss", $email, $senha);
    $stmtM->execute();
    $resultM = $stmtM->get_result();

    if(mysqli_num_rows($resultM) > 0){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: sistemaM.php");
        exit(); // Termina o script após o redirecionamento
    }

    // Consulta preparada para Fornecedores
    $sqlF = "SELECT * FROM Fornecedores WHERE email = ? and senha = ?";
    $stmtF = $conn->prepare($sqlF);
    $stmtF->bind_param("ss", $email, $senha);
    $stmtF->execute();
    $resultF = $stmtF->get_result();

    if(mysqli_num_rows($resultF) > 0){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: sistemaF.php");
        exit(); // Termina o script após o redirecionamento
    }

    // Se nenhum usuário for encontrado
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo '<script>';
    echo 'alert("Nenhum usuário encontrado!");';
    echo 'window.location.href = "login.php";'; // Redireciona para login.php
    echo '</script>';

} else {
    header("Location: login.php");
}
?>

