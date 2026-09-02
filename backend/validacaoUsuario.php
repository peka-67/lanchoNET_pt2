<?php 
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