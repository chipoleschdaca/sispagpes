<?php
session_start();
include('../../conexao.php');
include('../../verificar_login.php');
include('../../dist/php/functions.php');
login('TESOU', '../../');
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include('../../dist/php/pageHead.php'); ?>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">
    <?php include('../../dist/php/pageNavbar.php'); ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_tesouraria.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_tesouraria.php" class="nav-link">
                <i class="nav-icon far fa-chart-bar"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tempo_medio.php" class="nav-link active">
              <i class="nav-icon far fa-clock"></i>
                <p>
                  Tempo Médio
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <?= tempoMedioSecao($conexao); ?>
                    </div>
                </div>
            </div>    
        </div>
</div>
    </section>
    <?php include('../../dist/php/pageFooter.php'); ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
<?php include('../../dist/php/pageJavascript.php'); ?>
</body>
