<?php 
  include './backend/validacao.php';
  include './backend/validacaoUsuario.php';
  checarCargo('admin');
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
    <div class="col pedidosDivCol">
      <div style="margin-top: 20px;" class="row">
        <h1>Usuarios</h1>
      </div>
      <hr>
      <br>
      <div class="botaoGrande row">
        <a href="addUsuario.php" class="btn btn-primary btn-lg ">Adicionar usuario</a>
      </div>
      <br>
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Usuario</th>
              <th scope="col">Função</th>
              <th scope="col">Ultimo acesso</th>
              <th scope="col">Status</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>fulano <br> <small>exemplo@gmail.com</small> </td>
              <td>Manager</td>
              <td>dia, horario</td>
              <td> <?php include './fragmentos/ativo.php' ?> </td>   
            </tr>
             
            <tr>
              <td>fulano <br> <small>exemplo@gmail.com</small> </td>
              <td>Manager</td>
              <td>dia, horario</td>
              <td> <?php include './fragmentos/inativo.php' ?> </td>   
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>