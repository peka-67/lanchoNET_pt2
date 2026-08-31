<?php
include '../conexao.php';

if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cargo'], $_POST['ativo'], $_POST['efetivado_em'], $_POST['id_restaurante'])) {
    die('Todos os campos são obrigatórios.');
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cargo = $_POST['cargo'];
$ativo = $_POST['ativo'];
$efetivado_em = $_POST['efetivado_em'];
$id_restaurante = filter_var(
    $_POST['id_restaurante'],
    FILTER_VALIDATE_INT
);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Email inválido.');
}

if ($id_restaurante === false || $id_restaurante <= 0) {
    die("Restaurante inválido.");
}

$sql = "SELECT id FROM restaurantes WHERE id = ?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "i", $id_restaurante);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) == 0) {
    die("O restaurante informado não existe.");
}

$sql = "SELECT id FROM usuarios WHERE email = ?";

$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    die("Este e-mail já está cadastrado.");
}

$sql = "INSERT INTO usuarios (nome, email, senha, cargo, ativo, efetivado_em, id_restaurante) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssssisi", $nome, $email, $senha, $cargo, $ativo, $efetivado_em, $id_restaurante);
mysqli_stmt_execute($stmt);

header('Location:../../../addUsuario.php');
?>