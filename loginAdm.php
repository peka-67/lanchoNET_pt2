<!DOCTYPE html>
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

<body class="corpoLogin">

    <div class="row justify-content-center align-items-center vh-100 painel">
        <div class="col-8 col-sm-10 col-md-6 col-lg-4 card shadow p-3 telaLogin">
            <img style="align-self: center;" class="imglogo" src="./logo.png" alt="">
            <div class="text-center">
                <h3 class="m-4">Login Restaurante</h3>
            </div>
            <form action="./backend/loginAdm.php" method="post">
                <div class="mb-3">
                    <label class="form-label"> Email </label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Senha </label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <button type="submit" style="background-color: #df8601 !important;  border: none !important;" class="btn btn-primary btn-lg"> Entrar </button>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>