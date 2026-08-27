<?php 
//iniciar sessão

//se não houver variavel de sessão cpf e senha
function checarCargo($cargoPermitido) {
    if (!isset($_SESSION['cargo'])) {
        header('../index.php');
        exit;
    }

    if ($_SESSION['cargo'] !== $cargoPermitido) {
        http_response_code(403);
        die("Acesso negado.");
    }

}

?>