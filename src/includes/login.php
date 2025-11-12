<?php
session_start();
include_once("conexao.php"); // conexao.php deve estar na mesma pasta deste arquivo (src/includes)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $RA       = $_POST['RA'] ?? '';
    $password = $_POST['password'] ?? '';

    // Evita SQL injection (sempre use prepared statements)
    $stmt = $conn->prepare("SELECT * FROM alunos WHERE RA = ?");
    $stmt->bind_param("s", $RA);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica a senha (com hash)
        if (password_verify($password, $row['senha'])) {
            // Cria sessão
            $_SESSION['usuario'] = $row['nome'];
            $_SESSION['RA'] = $row['RA'];

            // Redireciona corretamente para a área do aluno
            header("Location: ../pages/usuario_login/index.php");
            exit;
        } else {
            echo "<script>
                    alert('Senha incorreta!');
                    window.location='../../index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('RA não encontrado!');
                window.location='../../index.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
