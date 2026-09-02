<?php
include '../../backend/conexao.php';

if($_SESSION['cargo']  )
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../../index.php');
    exit;
}

$id = $_POST['id'];

$sql = "DELETE * FROM restaurantes WHERE id='$id' ";
$resultado = mysqli_query($conexao, $sql);

header('location:.././criarRestaurante.php');
