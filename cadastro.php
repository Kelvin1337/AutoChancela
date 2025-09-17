<?php
session_start();
include_once("conexao.php");

if(isset($_POST['nome']) && isset($_POST['RA']) && isset($_POST['email']) && isset($_POST['password'])) {

    $nome = $conn->real_escape_string($_POST['nome']);
    $RA = $conn->real_escape_string($_POST['RA']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografa a senha

    // Verifica se o RA ou email já existe
    $check = $conn->query("SELECT * FROM alunos WHERE RA='$RA' OR email='$email'");
    if($check->num_rows > 0){
        $_SESSION['mensagem'] = "❌ RA ou Email já cadastrado!";
        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO alunos (nome, RA, email, senha) VALUES ('$nome', '$RA', '$email', '$senha')";

    if($conn->query($sql) === TRUE){
        $_SESSION['mensagem'] = "✅ Cadastro realizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "❌ Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit;

} else {
    $_SESSION['mensagem'] = "❌ Preencha todos os campos!";
    header("Location: index.php");
    exit;
}
?>
