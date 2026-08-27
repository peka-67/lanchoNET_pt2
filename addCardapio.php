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
                    <h2>Cadastro produtos</h2>
                    <div class="mb-3">
                        <label class="form-label"> id </label>
                        <input value="" type="text" name="id" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria do produto</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Cargo</option>
                            <option value="1">Gerente</option>
                            <option value="2">Caixa</option>
                            <option value="3">Cozinheiro</option>
                            <option value="4">Garçom</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Nome </label>
                        <input value="" type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Descrição </label>
                        <input value="" type="text" name="descricao" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Preço </label>
                        <input value="" type="password" name="preco" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Imagem </label>
                        <input value="" type="password" name="img" class="form-control">
                    </div>
                    <button style="background-color: #df8601 !important; border: none !important;" type="submit" class="btn btn-primary"> Cadastrar </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>