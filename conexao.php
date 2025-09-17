<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = ""; // padrão do XAMPP é vazio
$banco    = "sistema_alunos";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
