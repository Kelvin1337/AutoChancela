<?php
session_start(); // Inicia a sessão
include_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RA       = $_POST['RA'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM alunos WHERE RA='$RA'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifica a senha com hash
        if (password_verify($password, $row['senha'])) {
            // Salva informações do usuário na sessão
            $_SESSION['usuario'] = $row['nome'];
            $_SESSION['RA'] = $row['RA'];

            // Redireciona para a página do usuário
            header("Location: pages/usuario_login/index.php");
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('RA não encontrado!'); window.location='index.php';</script>";
    }
}

$conn->close();
?>
