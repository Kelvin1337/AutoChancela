<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Saindo...</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(90deg, #e2e2e2, #c9d6ff);
      font-family: 'Poppins', sans-serif;
      color: #333;
      text-align: center;
    }

    .logout-box {
      background: #fff;
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      animation: fadeIn 0.8s ease;
    }

    h1 {
      color: #7494ec;
      margin: 0;
    }

    p {
      font-size: 16px;
    }

    /* Loader animado */
    .loader {
      border: 5px solid #f3f3f3;
      border-top: 5px solid #7494ec;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg);}
      100% { transform: rotate(360deg);}
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.95);}
      to {opacity: 1; transform: scale(1);}
    }
  </style>
</head>
<body>
  <div class="logout-box">
    <h1>👋 Até mais!</h1>
    <p>Saindo da sua conta...</p>
    <div class="loader"></div>
  </div>

  <script>
    // Redireciona para a página principal de login após 1,5s
    setTimeout(() => {
      window.location.href = "index.php";
    }, 1500);
  </script>
</body>
</html>
