<?php
include '../conexao.php';
//receber os dados dos names do frontend
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cargo = mysqli_real_escape_string($conexao, $_POST('cargo'));
    $ativo = mysqli_real_escape_string($conexao, $_POST['ativo']);
    $efetivado_em = mysqli_real_escape_string($conexao, $_POST['efetivado_em']);
    $id_restaurante = mysqli_real_escape_string($conexao, $_POST['id_restaurante']);
    $origem = $_POST['origem'] ?? '';

//inserção em SQL - linguagem do banco
$sql = "INSERT INTO usuarios (nome, email, senha, cargo, ativo, efetivado_em, id_restaurante) VALUES ('$nome','$email','$hash','$cargo', '$ativo', '$efetivado_em', '$id_restaurante')";

$stmt = mysqli_prepare($conexao, $sql);
//executar
$resultado = mysqli_query($conexao, $sql);
$produtoId = mysqli_insert_id($conexao);

//atualizar a pagina
header('Location:../../../addUsuario.php');
?>