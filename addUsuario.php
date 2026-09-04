<?php
include './backend/conexao.php';
include './backend/validacao.php';
include './backend/validacaoUsuario.php';
$destino = './backend/CRUDS/usuarios/inserir.php';
checarCargo('admin');

if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id !== false && $id > 0) {
        $id_restaurante = $_SESSION['idRestaurante'];
        $sql = "SELECT * FROM usuarios WHERE id = ? AND id_restaurante = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $id, $id_restaurante);
        mysqli_stmt_execute($stmt);
        $resultadoUsuario = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($resultadoUsuario);
        if (!$usuario) {
            header('location: addUsuario.php');
            exit;
        }

        $destino = './backend/CRUDS/usuarios/alterar.php';
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap");
    </style>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link href="sideBar.css" rel="stylesheet">
    <title>Caixa</title>
</head>

<body class="body">
    <div class="container-fluid">
        <div class="row">
            <div style="width: fit-content;">
                <?php
                include './fragmentos/menulateral.php'
                ?>
            </div>
            <div class="col">
                <form action="<?= $destino ?>" method="post" enctype="multipart/form-data" class="p-3">
                    <h2>Cadastro Usuario</h2>
                    <div class="mb-3">
                        <label class="form-label"> id </label>
                        <input value="<?= $usuario['id'] ?? "" ?>" type="text" name="id" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Nome </label>
                        <input value="<?= $usuario['nome'] ?? "" ?>" type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> email </label>
                        <input value="<?= $usuario['email'] ?? "" ?>" type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Senha </label>
                        <input value="" type="password" name="senha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cargo do usuario </label>
                        <select class="form-select" name="cargo" aria-label="Default select example">
                            <option selected>Cargo</option>
                            <!-- <option value="1">Gerente</option> -->
                            <option value="caixa">Caixa</option>
                            <option value="cozinha">Cozinha</option>
                            <option value="garcom">Garçom</option>
                        </select>
                    </div>
                    <button name="id_restaurante" value="<?= $_SESSION['idRestaurante'] ?>" style="background-color: #df8601 !important; border: none !important;" type="submit" class="btn btn-primary"> Cadastrar </button>
                </form>
            </div>
            <div class="col">
                <br>
                <h3> <i class="fa-solid fa-address-book"></i> Listagem </h3>
                <table class="table" id="tabela">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cargo</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lista = "SELECT * FROM usuarios WHERE id_restaurante = ? AND cargo != 'admin' AND ativo = 1";
                        $stmt2 = mysqli_prepare($conexao, $lista);
                        mysqli_stmt_bind_param($stmt2, "i", $_SESSION['idRestaurante']);
                        mysqli_stmt_execute($stmt2);
                        $colunas = mysqli_stmt_get_result($stmt2);
                        while ($resultado = mysqli_fetch_assoc($colunas)) {
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $resultado['id'] ?> </th>
                                <td><?= htmlspecialchars($resultado['nome']) ?></td>
                                <td><?= htmlspecialchars($resultado['email']) ?></td>
                                <td><?= htmlspecialchars($resultado['cargo']) ?></td>
                                <td>
                                    <a href="./addUsuario.php?id=<?= $resultado['id'] ?>"> <i class="fa-solid fa-pen-to-square" style="color: rgb(1, 92, 164);"></i> </a>
                                    <a href="./inativar.php" onclick=""> <i class="fa-solid fa-trash" style="color: rgb(255, 0, 0);"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>