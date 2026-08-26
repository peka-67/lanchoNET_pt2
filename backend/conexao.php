<?php 
    $endereco = "localhost";
    $nome = "lancho-net";
    $usuario = "root";
    $senha = "";

    $conexao = mysqli_connect($endereco, $usuario, $senha, $nome);

    if(!$conexao) {
        echo "Erro de conexão";
    }
?>