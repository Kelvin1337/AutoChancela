<?php
session_start();
session_destroy();
header("Location: index.php"); // volta para a página principal de login
exit;
?>
