<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <?php
  if ($_SESSION['perfil_usuario'] == 'ADMIN') { ?>
    <ul class="navbar-nav ml-auto" style="float: right;">
      <select class="form-control" name="" id="" onchange="location = this.value;">
        <option value="" hidden selected>Alterar Perfil</option>
        <option value="../exercicioanterior/painel_exant.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Sacador</option>
        <option value="../tesoureiro/painel_tesouraria.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Tesouraria</option>
        <option value="../admin/painel_admin.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Administrador</option>
      </select>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a class="dropdown-item" href="../exercicioanterior/painel_exant.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Sacador</a>
          <a class="dropdown-item" href="../tesoureiro/painel_tesouraria.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Tesouraria</a>
          <a class="dropdown-item" href="../admin/painel_admin.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Administrador</a>
        </div>
      </li> -->
    </ul>
  <?php } ?>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-bars"></i>
        <?= $_SESSION['nome_usuario'] ?>
        <span class="d-lg-none d-md-block">Some Actions</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Perfil
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Configurações
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Atividade
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../../logout.php" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Sair
        </a>
      </div>
    </li>
  </ul>
</nav>