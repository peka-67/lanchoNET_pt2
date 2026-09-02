<?php 
    $endereco = "localhost";
    $nome = "lanchonet";
    $usuario = "root";
    $senha = "";

    $conexao = mysqli_connect($endereco, $usuario, $senha, $nome);

    if(!$conexao) {
        echo "Erro de conexão";
    }
?>