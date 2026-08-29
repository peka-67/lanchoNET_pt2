<?php

session_start();
//conectar com o banco 
include './conexao.php';

//receber o email e senha do front end por requisição
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$sql = "SELECT * FROM restaurantes WHERE email = 'maceciyema@gmail.com' LIMIT 1";

// prepara o php para uma execução de instrução do codigo sql
$stmt = mysqli_prepare($conexao, $sql);

// vincula variaveis aos marcadores de parametros (?)
mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$colunas = mysqli_fetch_assoc($resultado);

if ($colunas && password_verify($senha, $colunas['senha'])) {
    session_regenerate_id(true);

    $_SESSION['usuario'] = $colunas['nome'];
    $_SESSION['email'] = $colunas['email'];
    $_SESSION['id'] = $colunas['id'];
    
    header('location:../adm/criarRestaurante.php');
} 

else {
    header('location:../loginErrado.php');
}
