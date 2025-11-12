<?php
$alert = ""; // mensagem para o pop-up

if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Simula verificação no banco de dados
    $emails_cadastrados = ["teste@exemplo.com", "usuario@teste.com"];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alert = "Digite um e-mail válido!";
    } elseif(in_array($email, $emails_cadastrados)) {
        $alert = "O e-mail já está cadastrado!";
    } else {
        $alert = "E-mail cadastrado com sucesso! Um link de recuperação foi enviado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
    
    <!-- CSS local da página -->
    <link rel="stylesheet" href="../../assets/css/senha.css">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <h1>Esqueci a Senha</h1>

        <form action="" method="POST">
            <div class="input-box">
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <button type="submit" class="btn">Enviar Link de Recuperação</button>
        </form>

        <div class="forgot-link">
            <!-- Ajuste: caminho correto para o index.php na raiz -->
            <a href="../../../index.php" class="back-btn">
                <i class='bx bx-arrow-back'></i> Voltar à página inicial
            </a>
        </div>
    </div>

    <!-- Pop-up alert -->
    <script>
        <?php if(isset($_POST['email']) && $alert != ""): ?>
            alert("<?php echo addslashes($alert); ?>");
        <?php endif; ?>
    </script>
</body>
</html>
