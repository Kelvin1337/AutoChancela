<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../../index.php"); // redireciona para a página de login principal
    exit;
}
$nomeUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gerenciador de Veículos</title>
  <link rel="stylesheet" href="style.css">
  <script defer src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
</head>
<body>
  <div class="container">
    <!-- Cabeçalho com nome do usuário e botão Sair -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <strong>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?></strong>
      <form method="post" action="logout.php" style="margin:0;">
        <button type="submit" class="btn-icon"><i class="fas fa-sign-out-alt"></i> Sair</button>
      </form>
    </div>

    <!-- Tela principal -->
    <div id="main-screen">
      <h2>Meus Veículos</h2>
      <div class="vehicle-list" id="vehicle-list"></div>
      <button class="btn" onclick="abrirFormulario()">+ Adicionar Novo Veículo</button>
    </div>

    <!-- Tela de adicionar veículo -->
    <div id="form-screen">
      <h2>Adicionar Veículo</h2>
      <div class="input-box">
        <select id="novo-tipo">
          <option value="">Selecione o tipo do veículo</option>
          <option value="Carro">Carro</option>
          <option value="Moto">Moto</option>
          <option value="Caminhão">Caminhão</option>
          <option value="Outro">Outro</option>
        </select>
        <i class="fas fa-tag"></i>
      </div>
      <div class="input-box">
        <input type="text" id="novo-modelo" placeholder="Digite o modelo" />
        <i class="fas fa-car"></i>
      </div>
      <div class="input-box">
        <select id="novo-cor">
          <option value="">Selecione a cor</option>
          <option value="Preto">Preto</option>
          <option value="Branco">Branco</option>
          <option value="Prata">Prata</option>
          <option value="Cinza">Cinza</option>
          <option value="Vermelho">Vermelho</option>
          <option value="Azul">Azul</option>
        </select>
        <i class="fas fa-palette"></i>
      </div>
      <div class="input-box">
        <input type="number" id="novo-ano" placeholder="Ano" />
        <i class="fas fa-calendar"></i>
      </div>
      <div class="input-box">
        <input type="text" id="novo-placa" placeholder="Placa brasileira (ex: BRA2E19 ou ABC1234)" />
        <i class="fas fa-id-card"></i>
      </div>
      <button class="btn" onclick="adicionarVeiculo()">Salvar</button>
      <div class="back-btn" onclick="voltar()">← Voltar</div>
    </div>

    <!-- Tela de editar veículo -->
    <div id="edit-screen">
      <h2>Editar Veículo</h2>
      <div class="input-box">
        <select id="edit-tipo">
          <option value="">Selecione o tipo do veículo</option>
          <option value="Carro">Carro</option>
          <option value="Moto">Moto</option>
          <option value="Caminhão">Caminhão</option>
          <option value="Outro">Outro</option>
        </select>
        <i class="fas fa-tag"></i>
      </div>
      <div class="input-box">
        <input type="text" id="edit-modelo" placeholder="Digite o modelo" />
        <i class="fas fa-car"></i>
      </div>
      <div class="input-box">
        <select id="edit-cor">
          <option value="">Selecione a cor</option>
          <option value="Preto">Preto</option>
          <option value="Branco">Branco</option>
          <option value="Prata">Prata</option>
          <option value="Cinza">Cinza</option>
          <option value="Vermelho">Vermelho</option>
          <option value="Azul">Azul</option>
        </select>
        <i class="fas fa-palette"></i>
      </div>
      <div class="input-box">
        <input type="number" id="edit-ano" placeholder="Ano" />
        <i class="fas fa-calendar"></i>
      </div>
      <div class="input-box">
        <input type="text" id="edit-placa" placeholder="Placa brasileira (ex: BRA2E19 ou ABC1234)" />
        <i class="fas fa-id-card"></i>
      </div>
      <button class="btn" onclick="salvarEdicao()">Salvar Alterações</button>
      <div class="back-btn" onclick="voltar()">← Voltar</div>
    </div>
  </div>
</body>
</html>
