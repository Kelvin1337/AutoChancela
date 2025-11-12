<?php
session_start();
include_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome     = $_POST['nome'];
    $RA       = $_POST['RA'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $senhaHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO alunos (nome, RA, email, senha) 
            VALUES ('$nome', '$RA', '$email', '$senhaHash')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensagem'] = "✅ Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "❌ Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();

header("Location: ../index.php");
exit;
?>
