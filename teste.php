<?php
    $senha = $_REQUEST['senha'];

    $hash = password_hash($senha, PASSWORD_DEFAULT);

    echo $hash;
?>