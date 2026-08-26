<!doctype html>
<html lang="pt-BR">

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
    <div class="row container-fluid">
        <div style="width: fit-content;">
            <?php
            include './fragmentos/menulateral.php'
            ?>
        </div>
        <div class="col pedidosDivCol">
            <div style="margin-top: 20px;" class="row">
                <h1>Realizar pagamento</h1>
            </div>
            <hr>
            <br>
            <div class="row divTabelaCardapio">
                <div class="col">
                    <div class="card">
                        <h5 style="font-size:25px ;" class="card-header">Forma de pagamento</h5>
                        <div class="card-body">
                            <select style="font-size:20px ;  margin-bottom: 10px;" class="form-select" aria-label="Default select example">
                                <option selected>Selecionar forma de pagamento</option>
                                <option value="1">Cartão de débito</option>
                                <option value="2">Cartão de crédito</option>
                                <option value="3">Pix</option>
                            </select>
                            <a href="#" style="width: 15vw; font-size:20px ;  background-color: #df8601 !important; border: none !important;" class="btn btn-primary">Confirmar pagamento</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card caixaPagamento" style="width: 25rem;">
                        <div class="card-body">
                            <h5 style="font-size: 25px;" class="card-title">Pedido #6742</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li style="font-size: 25px;" class="list-group-item">2x big-burger <br> <small> 29,90 unidade </small> </li>
                            <li class="list-group-item">1x coca 600ml <br> <small> 29,90 unidade </small></li>
                            <li class="list-group-item">1x milkshake 600ml <br> <small> 29,90 unidade </small></li>
                            <li style="font-size: 22px;" class="list-group-item">Total: 25,75</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>