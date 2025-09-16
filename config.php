<?php

    session_start();

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $dbname = 'bd_estacionamento';

    $conexao=mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    global $pdo;

    try{

        $pdo = new PDO("mysql:dbname=". $dbname."; host=".$servidor, $usuario,$senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    } catch(PDOException $e) {
        echo "ERRO: ". $e->getMessage();
        exit;
    }
    //if($conexao->connect_errno)
    //{
    //    echo "Erro";
    //}
    //else
    //{
    //   echo "conexão efetuada com sucesso";
    //}

?>