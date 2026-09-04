<?php
include '../../conexao.php';

$id = $_POST['id'];
$ativo = $_POST['ativo'];

$sql2 = "UPDATE usuarios SET ativo= ? WHERE id= ?";

$stmt = mysqli_prepare($conexao, $sql2);

mysqli_stmt_bind_param($stmt, "ii", $ativo, $id);

$resultado = mysqli_stmt_execute($stmt);

