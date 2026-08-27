<?php 
  include './backend/validacao.php'
?>

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
    <div class="col">
      <div style="margin-top: 20px;" class="row">
        <h1>Cozinha</h1>
      </div>
      <hr>
      <div class="cardsCozinha">
        <div class="statusCard">
          <div class="tituloCard">
            <?php include './fragmentos/emPrep.php' ?>
          </div>
          <div class="card cardsPreparo">
            <h5 class="card-header">Pedido #6742</h5>
            <div class="card-body">
              <h5 class="card-title">produto 1</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
          <div class="card cardsPreparo">
            <h5 class="card-header">Pedido #6742</h5>
            <div class="card-body">
              <h5 class="card-title">produto 1</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="statusCard">
          <div class="tituloCard">
            <?php include './fragmentos/pronto.php' ?>
          </div>
          <div class="card cardsPreparo">
            <h5 class="card-header">Pedido #6742</h5>
            <div class="card-body">
              <h5 class="card-title">produto 1</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
          <div class="card cardsPreparo">
            <h5 class="card-header">Pedido #6742</h5>
            <div class="card-body">
              <h5 class="card-title">produto 1</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>