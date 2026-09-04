<?php
include './backend/conexao.php';
include './backend/validacao.php';
include './backend/validacaoUsuario.php';
$destino = './backend/CRUDS/usuarios/inserir.php';
checarCargo('admin');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        window.onload = function excluirUsuario(id) {
            if (!confirm("Tem certeza que deseja excluir este usuário?")) {
                return;
            }

            const form = document.createElement("form");
            form.method = "POST";
            form.action = "./backend/CRUDS/usuarios/excluir.php";

            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "id";
            input.value = <?php echo $_SESSION['usuario_id'] ?>;

            const input2 = document.createElement("input2");
            input.type = "hidden";
            input.name = "ativo";
            input.value = 2;

            form.appendChild(input1);
            form.appendChild(input2);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>

</html>