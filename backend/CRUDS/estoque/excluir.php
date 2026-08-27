<?php 
    include 'conexao.php'

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM itens_estoque WHERE id='$id' ";
    $resultado = mysqli_query($conexao, $sql);

    header('location:../../estoque.php');
?>
