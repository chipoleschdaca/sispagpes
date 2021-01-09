<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('../../dist/php/pageHead.php'); ?>
<style>
  #tabcharts {
    display: flex;
    justify-content: space-between
  }

  #filter {
    position: relative;
    text-align: center;
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include('../../dist/php/pageNavbar.php'); ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_exant.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_exant.php" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Exercício Anterior</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="requerentes.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>
                      Requerentes
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="processos_exant.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Processos</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
    <?php include('../../dist/php/section_query_historico.php'); ?>
    </div>
    <?php include('../../dist/php/pageFooter.php'); ?>
    <?php include('../../dist/php/query_historico.php'); ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php include('../../dist/php/pageJavascript.php'); ?>
  <?php include('../../dist/php/scripts_query_historico.php'); ?>
</body>

</html>
