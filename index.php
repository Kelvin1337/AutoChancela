<?php
session_start();
$mensagem = "";

// Verifica se existe mensagem de cadastro (vinda do cadastro.php)
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do(a) Aluno(a) - Login</title>

    <!-- Ícones -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- CSS principal -->
    <link rel="stylesheet" href="src/assets/css/style.css">
</head>
<body>
    <div class="container">

        <!-- MENSAGEM DE ALERTA -->
        <?php if (!empty($mensagem)): ?>
            <div class="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <!-- FORM LOGIN -->
        <div class="form-box login">
        <form action="src/includes/login.php" method="POST">
                <h1>Área do(a) Aluno(a)</h1>
                <div class="input-box">
                    <input type="text" name="RA" placeholder="RA (número de matrícula)" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Senha" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="forgot-link">
                    <a href="src/pages/esqueceu_senha/index.php">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <!-- FORM REGISTRO -->
        <div class="form-box register">
            <form action="src/includes/cadastro.php" method="POST">
                <h1>Registre-se</h1>
                <div class="input-box">
                    <input type="text" name="nome" placeholder="Nome" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="RA" placeholder="RA (número de matrícula)" required>
                    <i class='bx bxs-user-badge'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="bx bxs-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Senha" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="input-box checkbox-box">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">
                        Li e concordo com os 
                        <a href="src/pages/termos/index.html" target="_blank">termos de uso</a>
                    </label>
                </div>
                <button type="submit" class="btn">Registrar</button>
            </form>
        </div>

        <!-- TOGGLE BOX -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Olá, seja bem-vindo!</h1>
                <p>Não tem uma conta?</p>
                <button class="btn register-btn">Registre-se</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bem-vindo de volta!</h1>
                <p>Já tem uma conta?</p>
                <button class="btn login-btn">Logue-se</button>
            </div>
        </div>
    </div>

    <!-- JS principal -->
    <script src="src/assets/js/main.js"></script>
</body>
</html>
