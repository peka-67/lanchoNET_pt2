<?php 
    include 'conexao.php'

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM usuarios WHERE id='$id' ";
    $resultado = mysqli_query($conexao, $sql);

    header('location:../../addUsuario.php');
?>
