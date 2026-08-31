<?php
include './backend/validacao.php';
include './backend/validacaoAdm.php';

checarCargo('admin');
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
                <form action="" method="post" enctype="multipart/form-data" class="p-3">
                    <h2>Cadastro Restaurante</h2>
                    <div class="mb-3">
                        <label class="form-label"> id </label>
                        <input value="" type="text" name="id" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Nome </label>
                        <input value="" type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Endereço </label>
                        <input value="" type="text" name="endereco" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Telefone </label>
                        <input value="" type="text" name="telefone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Cnpj </label>
                        <input value="" type="text" name="cnpj" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> email </label>
                        <input value="" type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Senha </label>
                        <input value="" type="password" name="senha" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categorias</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="checkDefault1">
                            <label class="form-check-label" for="checkDefault1">
                                Lanches
                            </label>
                            <input class="form-check-input" type="checkbox" value="2" id="checkDefault2">
                            <label class="form-check-label" for="checkDefault2">
                                Porções
                            </label>
                            <input class="form-check-input" type="checkbox" value="3" id="checkDefault3">
                            <label class="form-check-label" for="checkDefault3">
                                Pratos
                            </label>
                            <input class="form-check-input" type="checkbox" value="4" id="checkDefault4">
                            <label class="form-check-label" for="checkDefault4">
                                Pizzas
                            </label>
                            <input class="form-check-input" type="checkbox" value="5" id="checkDefault5">
                            <label class="form-check-label" for="checkDefault5">
                                Bebidas
                            </label>
                            <input class="form-check-input" type="checkbox" value="8" id="checkDefault8">
                            <label class="form-check-label" for="checkDefault8">
                                Bebidas alcoolicas
                            </label>
                            <input class="form-check-input" type="checkbox" value="6" id="checkDefault6">
                            <label class="form-check-label" for="checkDefault6">
                                Sorvetes/milkshakes
                            </label>
                            <input class="form-check-input" type="checkbox" value="7" id="checkDefault7">
                            <label class="form-check-label" for="checkDefault7">
                                Outros
                            </label>
                        </div>
                    </div>
                    <button style="background-color: #df8601 !important; border: none !important;" type="submit" class="btn btn-primary"> Cadastrar </button>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>fulano</td>
                            <td>fulano@gmail.com</td>
                            <td>Gerente</td>
                            <td>
                                <a href=""> <i class="fa-solid fa-pen-to-square" style="color: rgb(1, 92, 164);"></i> </a>
                                <a href="" onclick="return confirm('Deseja realmente excluir?')"> <i class="fa-solid fa-trash" style="color: rgb(255, 0, 0);"></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>