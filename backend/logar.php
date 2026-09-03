<?php

session_start();
include './conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$usuario = mysqli_fetch_assoc($resultado);

if ($usuario) {

    if (!password_verify($senha, $usuario['senha'])) {
        header('Location: ../loginErrado.php');
        exit;
    }

    session_regenerate_id(true);

    $_SESSION['tipo'] = 'usuario';
    $_SESSION['usuario'] = $usuario['nome'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['cargo'] = $usuario['cargo'];
    $_SESSION['idRestaurante'] = $usuario['id_restaurante'];

    if ($usuario['cargo'] === 'admin') {
        header('Location: ../dashboard.php');
        exit;
    }

    if ($usuario['cargo'] === 'cozinha') {
        header('Location: ../cozinha.php');
        exit;
    }

    header('Location: ../caixa.php');
    exit;
}


$sql2 = "SELECT * FROM administrador WHERE email = ? LIMIT 1";

$stmt2 = mysqli_prepare($conexao, $sql2);
mysqli_stmt_bind_param($stmt2, "s", $email);
mysqli_stmt_execute($stmt2);
$resultado2 = mysqli_stmt_get_result($stmt2);
$admin = mysqli_fetch_assoc($resultado2);
if ($admin) {
    if (!password_verify($senha, $admin['senha'])) {
        header('location: ../loginErrado.php');
        exit;
    }
    session_regenerate_id(true);
    $_SESSION['admin_email'] = $admin['email'];
    $_SESSION['admin_id'] = $admin['id'];
    header('location: ../adm/criarRestaurante');
    exit;
}

header('location:../loginErrado.php');
exit;
