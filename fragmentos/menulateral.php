<?php 
  include './backend/validacaoAdm.php';
  include './backend/validacao.php';
?>

  <div class="barraLateral">
    <div class="offcanvas-body">
      <div>
     <img class="imglogo" src="./logo.png" alt="">
      </div>
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <?php if ($_SESSION['cargo'] == checarCargo('admin')): ?>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?> " aria-current="page" href="dashboard.php"><i class="fa-solid fa-house" style="color: rgb(255, 255, 255);"></i> Página inicial</a>
          </li>
        <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'caixa.php') ? 'active' : ''; ?>" href="caixa.php"><i class="fa-solid fa-cash-register" style="color: rgb(255, 255, 255);"></i> Caixa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pedidos.php') ? 'active' : ''; ?>" href="pedidos.php"><i class="fa-solid fa-clipboard" style="color: rgb(255, 255, 255);"></i> Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'cozinha.php') ? 'active' : ''; ?>" href="cozinha.php"><i class="fa-solid fa-kitchen-set" style="color: rgb(255, 255, 255);"></i> Cozinha</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'cardapio.php') ? 'active' : ''; ?>" href="cardapio.php"><i class="fa-solid fa-list" style="color: rgb(255, 255, 255);"></i> Cardapio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'estoque.php') ? 'active' : ''; ?>" href="estoque.php"><i class="fa-solid fa-box-archive" style="color: rgb(255, 255, 255);"></i> Estoque</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'relatorios.php') ? 'active' : ''; ?>" href="relatorios.php"><i class="fa-regular fa-chart-bar" style="color: rgb(255, 255, 255);"></i>Relatório</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'usuarios.php') ? 'active' : ''; ?>" href="usuarios.php"><i class="fa-solid fa-users" style="color: rgb(255, 255, 255);"></i> Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'configuracoes.php') ? 'active' : ''; ?>" href="configuracoes.php"><i class="fa-solid fa-gear" style="color: rgb(255, 255, 255);"></i> Configurções</a>
          </li>
        </ul>
      </div>
    </div>
  




