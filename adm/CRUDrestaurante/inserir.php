<?php
include '../../backend/conexao.php';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: ../../index.php');
    exit;
}

if (!isset($_POST['nome'], $_POST['endereco'], $_POST['senha'], $_POST['telefone'], $_POST['cnpj'], $_POST['email'])) {
    die('Todos os campos são obrigatórios.');
}

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$efetivado_em = date('Y-m-d H:i:s');


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Email inválido.');
}

$sql = "SELECT id FROM restaurantes WHERE email = ?";

$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    die("Este e-mail já está cadastrado.");
}

$sql = "INSERT INTO restaurantes (nome, endereco, senha, telefone, cnpj, email, criado_em) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "sssssss", $nome, $endereco, $senha, $telefone, $cnpj, $email, $efetivado_em);
if (mysqli_stmt_execute($stmt)) {
    $id_restaurante = mysqli_insert_id($conexao);

    $sql = "INSERT INTO usuarios (nome, email, senha, cargo, efetivado_em, id_restaurante) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    $cargo = "admin";

    mysqli_stmt_bind_param($stmt, "sssssi", $nome, $email, $senha, $cargo, $efetivado_em, $id_restaurante);
    mysqli_stmt_execute($stmt);

    header('Location:../criarRestaurante.php');
    exit;
}

else {
    die("erro ao cadastrar o restaurante:" . mysqli_stmt_error($stmt));

}



?>