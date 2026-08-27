<?php
include '../conexao.php';
//receber os dados dos names do frontend
    $nome = mysqli_real_escape_string($conexao, $_REQUEST['nome']);
    $unidade = mysqli_real_escape_string($conexao, $_REQUEST['unidade']);
    $quantidade = mysqli_real_escape_string($conexao, $_REQUEST['quantidade']);
    $quantidade_minima = mysqli_real_escape_string($conexao, $_REQUEST('quantidade_minima'));
    $ativo = mysqli_real_escape_string($conexao, $_REQUEST['ativo']);
    $origem = $_POST['origem'] ?? '';

//inserção em SQL - linguagem do banco
$sql = "INSERT INTO itens_estoque(nome, unidade, quantidade, quantidade_minima, ativo) VALUES ('$nome','$unidade','$quantidade','$quantidade_minima', '$ativo')";
//executar
$resultado = mysqli_query($conexao, $sql);
$produtoId = mysqli_insert_id($conexao);

//atualizar a pagina
header('Location:../../../estoque.php');
?>