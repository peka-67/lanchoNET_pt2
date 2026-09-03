<?php
include '../../conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../../../index.php');
    exit;
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cargo = $_POST['cargo'];

if (!isset($senha)) {
    $sql = "UPDATE usuarios SET nome= ?, email= ?, cargo= ? WHERE id= ?";

    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $cargo, $id);

    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        header('location: ../../../addUsuario.php');
    }
} else {
    $sql2 = "UPDATE usuarios SET nome= ?, email= ?, senha= ?, cargo= ? WHERE id= ?";

    $stmt2 = mysqli_prepare($conexao, $sql2);

    mysqli_stmt_bind_param($stmt2, "ssssi", $nome, $email, $senha, $cargo, $id);

    $resultado2 = mysqli_stmt_execute($stmt2);

    if ($resultado2) {
        header('location: ../../../addUsuario.php');
    }
}
