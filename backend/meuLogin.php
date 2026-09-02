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

$sql = "SELECT * FROM administrador WHERE email = ? LIMIT 1";

// prepara o php para uma execução de instrução do codigo sql
$stmt = mysqli_prepare($conexao, $sql);

// vincula variaveis aos marcadores de parametros (?)
mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$colunas = mysqli_fetch_assoc($resultado);

if ($colunas && password_verify($senha, $colunas['senha']) && password_verify($email, $colunas['email']) ) {
    session_regenerate_id(true);

    $_SESSION['email'] = $colunas['email'];
    $_SESSION['admin_id'] = $colunas['id'];

    if ($colunas['admin_id'] === '1' ) {
        header('location:../adm/criarRestaurante.php');
    }

} 
else {
    header('location:../loginErrado.php');
}
