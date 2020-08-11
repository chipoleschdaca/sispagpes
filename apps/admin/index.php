<?php
session_start();
include('../../conexao.php');
include('../../verificar_login.php');
include('../../dist/php/functions.php');
login('ADMIN', '../../');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../../dist/img/gapls.png">
  <title>SISPAGPES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/bootstrap-4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/btn-table.css">
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="../../plugins/toastr/toastr.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <?php
      if ($_SESSION['perfil_usuario'] == 'ADMIN') { ?>
        <ul class="navbar-nav ml-auto" style="float: right;">
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
              <a class="dropdown-item" href="../exercicioanterior/painel_exant.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Sacador</a>
              <a class="dropdown-item" href="../tesoureiro/painel_tesouraria.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Tesouraria</a>
              <a class="dropdown-item" href="../admin/painel_admin.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Painel Administrador</a>
            </div>
          </li>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-fingerprint"></i>
                <p>
                  Militares
                  <?php
                  $query = "SELECT * FROM militares WHERE status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>' ?>
                  <?php } else {
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Perfis
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Seções
                  <?php
                  $query = "SELECT * FROM tb_secoes_exant WHERE status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>';
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-medal"></i>
                <p>
                  Posto
                  <?php
                  $query = "SELECT * FROM tb_posto WHERE status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  if ($row > 0) {
                    echo '<span class="badge badge-warning right">' . $row . '</span>';
                  } else {
                  } ?>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Exercício Anterior
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div id="divHome" hidden><?php include('painel_admin.php') ?></div>
          <div id="divMilitar" hidden><?php include('militares2.php') ?></div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      &copy; 2019-<?= date("Y") ?> <a href="#"><b>SISPAGPES</b></a>. Desenvolvido por DANIEL ANGELO <b style="text-decoration: underline;">CHIPOLESCH</b> DE ALMEIDA <b>1º Ten Int</b> <span class="float-right"> v1.1.1</span>
    </footer>
  </div>
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../dist/js/adminlte.js"></script>
  <script src="../../plugins/jquery-mask/dist/jquery.mask.js"></script>
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="../../dist/js/validation.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="../../plugins/select2/js/select2.full.min.js"></script>
  <script src="../../plugins/bootstrap-4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="../../dist/js/myCharts.js"></script>
  <script src="../../plugins/jquery-quicksearch/jquery.quicksearch.min.js"></script>
  <script src="../../dist/js/functions.js"></script>
</body>

</html>