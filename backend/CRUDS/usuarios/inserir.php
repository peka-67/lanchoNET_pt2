<?php
include '../../conexao.php';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: ../../../index.php');
    exit;
}

if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cargo'])) {
    die('Todos os campos são obrigatórios.');
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cargo = $_POST['cargo'];
$efetivado_em = date('Y-m-d H:i:s');

$selectId = "SELECT * FROM usuarios WHERE id = ?";
$stmt = mysqli_prepare($conexao, $selectId);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$restauranteId = mysqli_stmt_get_result($stmt);
$resultadoRestaurante = mysqli_fetch_assoc($restauranteId); 

$id_restaurante = $resultadoRestaurante['id_restaurante'];

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

$sql = "INSERT INTO usuarios (nome, email, senha, cargo, efetivado_em, id_restaurante) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "sssssi", $nome, $email, $senha, $cargo, $efetivado_em, $id_restaurante);
if (mysqli_stmt_execute($stmt)) {
    header('Location:../../../addUsuario.php');
    exit;
}

else {
    die("erro ao cadastrar o usuario:" . mysqli_stmt_error($stmt));

}


?>