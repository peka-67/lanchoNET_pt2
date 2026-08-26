<?php
    //conectar com o banco 
    include './conexao.php';

    //receber o email e senha do front end por requisição
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    //SQL que busca no banco um usuário com o email e senha recebidos 
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    //executar a SQL
    $resultado = mysqli_query($conexao, $sql);
    //pegar valores das colunas do banco
    $colunas = mysqli_fetch_assoc($resultado);

    echo $colunas['nome'];
    
    if (mysqli_num_rows($resultado) > 0) {
        session_start();

        $_SESSION ['usuario'] = $colunas['nome'];
        $_SESSION ['email'] = $colunas ['email'];
        $_SESSION['senha'] = $colunas ['senha'];
        
        header('location:../dashboard.php');
    }
    else {
        header('location:../loginErrado.php');
    }

?>