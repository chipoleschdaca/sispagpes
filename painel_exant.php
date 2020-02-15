<?php
session_start();
include('verificar_login.php');
include('conexao.php');
if ($_SESSION['perfil_usuario'] != 'EXANT') {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="dist/img/gapls.png">
  <title>SISPAGPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
        <!-- Este é a tag que faz aparecer o nome aparece no menu direito superior. -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars"></i>
            <?php echo $_SESSION['nome_usuario'] ?>
            <span class="d-lg-none d-md-block">Some Actions</span>
          </a>
          <!-- Dropdown - User Information -->
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
            <a class="dropdown-item" href="logout.php" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Sair
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_exant.php" class="brand-link" style="heigh:50px;">
        <img src="dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
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
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                  Ordens de Serviço
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="os_abertas.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Abertas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="consultar_os.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Consultar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rel_orcamentos.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Relatórios</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <!--/.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <section class="col-md-12 connectedSortable">
              <form class="form-inline">
                <div class="card col-md-12">
                  <div class="card-body">
                    <div class="input-group input-group-sm">
                      <label for="txtpesquisar" style="margin-right: 10px;">Filtrar:
                      </label>
                      <select class="form-control select2" name="txtposto" style="border-radius:3px; margin-right:20px">
                        <option value="" selected>POSTO/GRAD.</option>
                        <?php
                        $query_posto = "SELECT r.posto as id_posto, p.posto as nome_posto FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto GROUP BY r.posto";
                        $result_posto = mysqli_query($conexao, $query_posto);
                        if (count($result_posto)) {
                          while ($res_p = mysqli_fetch_array($result_posto)) {
                            $id = $res_p['id_posto'];
                            $posto = $res_p['nome_posto'];
                        ?>
                            <option value="<?php echo $id ?>"><?php echo $posto ?></option>
                        <?php }
                        } ?>
                      </select>
                      <select class="form-control select2" id="txtdireitopleiteado" name="txtdireitopleiteado" placeholder="DIREITO PLEITEADO" style="border-radius:3px; margin-right:20px">>
                        <option value="">DIREITO PLEITEADO</option>
                        <?php
                        $query_direito = "SELECT d.id as id_direito, d.direito as direito_pleiteado, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON d.id = e.direito_pleiteado GROUP BY e.direito_pleiteado";
                        $result_direito = mysqli_query($conexao, $query_direito);
                        if (count($result_direito)) {
                          while ($res_dir = mysqli_fetch_array($result_direito)) {
                            $id = $res_dir['id_direito'];
                            $direito = $res_dir['direito_pleiteado'];
                            $count_direito = $res_dir['COUNT(e.direito_pleiteado)'];
                        ?>
                            <option value="<?php echo $id ?>"><?php echo $direito . " | " . $count_direito ?></option>
                        <?php }
                        } ?>
                      </select>
                      <select class="form-control select2" id="txtestado" name="txtestado" style="border-radius:3px; margin-right:20px">
                        <option value="" selected>ESTADO DO PROCESSO</option>
                        <?php
                        $query_est = "SELECT est.id as id_estado, est.estado as estado_processo FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON est.id = e.estado GROUP BY e.estado";
                        $result_est = mysqli_query($conexao, $query_est);
                        if (count($result_est)) {
                          while ($res_est = mysqli_fetch_array($result_est)) {
                            $id_est_2 = $res_est['id_estado'];
                            $estado_est = $res_est['estado_processo'];
                        ?>
                            <option value="<?php echo $id_est_2 ?>"><?php echo $estado_est ?></option>
                        <?php }
                        } ?>
                      </select>
                      <select class="form-control select2" id="txtsecao" name="txtsecao" style="border-radius:3px; margin-right:10px">
                        <option value="" selected>SEÇÃO ATUAL</option>
                        <?php
                        $query_sec = "SELECT s.id as id_secao, s.secao as secao_atual, COUNT(e.secao_atual) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON s.id = e.secao_atual GROUP BY e.secao_atual";
                        $result_sec = mysqli_query($conexao, $query_sec);
                        if (count($result_sec)) {
                          while ($res_sec = mysqli_fetch_array($result_sec)) {
                            $id_sec_2 = $res_sec['id_secao'];
                            $secao_sec = $res_sec['secao_atual'];
                            $count_secao = $res_sec['COUNT(e.secao_atual)'];
                        ?>
                            <option value="<?php echo $id_sec_2 ?>"><?php echo $secao_sec . " | " . $count_secao ?></option>
                        <?php }
                        } ?>
                      </select>
                      <button class="btn btn-primary btn-primary-navbar btn-sm" type="submit" name="buttonPesquisar">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </section>
          </div>
          <div class="row">
            <div class="card">
              <div class="card-header" style="text-align:center;">
                <b>
                  <h3>DASHBOARD</h3>
                </b>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <canvas id="pieChart" style="height:150px;"></canvas>
                    <canvas id="myChart2" style="height:150px;"></canvas>
                  </div>
                  <div class="col-md-6">
                    <canvas id="donutChart" style="height:150px;"></canvas>
                    <canvas id="myChart" style="height:150px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">GAP-LS</a>.</strong>
      Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Versão</b> 1.0.0
      </div>
    </footer>
    <?php

    $id = "";
    $id_req = "";
    $direito_pleiteado = "";
    $estado = "";
    $secao = "";
    $posto = "";
    $count_direito = "";
    $count_estado = "";
    $count_secao = "";
    $count_posto = "";

    if (isset($_GET['buttonPesquisar']) and $_GET['txtposto'] != '') {

      $nome = $_GET['txtposto'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY r.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, r.posto, p.posto, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY direito_pleiteado";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, r.posto, p.posto, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY e.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, r.posto, p.posto, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE r.posto = '$nome' GROUP BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    } elseif (isset($_GET['buttonPesquisar']) and $_GET['txtdireitopleiteado'] != '') {

      $nome = $_GET['txtdireitopleiteado'];

      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto WHERE direito_pleiteado = '$nome' GROUP BY r.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id WHERE direito_pleiteado = '$nome' GROUP BY direito_pleiteado ";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE direito_pleiteado = '$nome' GROUP BY e.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id WHERE direito_pleiteado = '$nome' GROUP BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    } else {
      $query_posto = "SELECT r.posto, p.posto as nome_posto, COUNT(r.posto) FROM exercicioanterior as e LEFT JOIN requerentes as r ON e.requerente = r.id LEFT JOIN tb_posto as p ON p.id = r.posto GROUP BY r.posto";
      $result_posto = mysqli_query($conexao, $query_posto);
      while ($res_posto = mysqli_fetch_array($result_posto)) {

        $posto = $posto . '"' . $res_posto["nome_posto"] . '",';
        $count_posto = $count_posto . '"' . $res_posto["COUNT(r.posto)"] . '",';

        $posto =  trim($posto);
        $count_posto =  trim($count_posto);
      }

      $query_direito = "SELECT e.direito_pleiteado, d.id, d.direito as nome_direito, COUNT(e.direito_pleiteado) FROM exercicioanterior as e LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id GROUP BY direito_pleiteado";
      $result_direito = mysqli_query($conexao, $query_direito);
      while ($res_direito = mysqli_fetch_array($result_direito)) {

        $direito_pleiteado = $direito_pleiteado . '"' . $res_direito["nome_direito"] . '",';
        $count_direito = $count_direito . '"' . $res_direito["COUNT(e.direito_pleiteado)"] . '",';

        $direito_pleiteado =  trim($direito_pleiteado);
        $count_direito =  trim($count_direito);
      }

      $query_estado = "SELECT e.estado, est.id, est.estado, COUNT(e.estado) FROM exercicioanterior as e LEFT JOIN tb_estado_exant as est ON e.estado = est.id GROUP BY e.estado";
      $result_estado = mysqli_query($conexao, $query_estado);
      while ($res_estado = mysqli_fetch_array($result_estado)) {

        $estado = $estado . '"' . $res_estado["estado"] . '",';
        $count_estado = $count_estado . '"' . $res_estado["COUNT(e.estado)"] . '",';

        $estado =  trim($estado);
        $count_estado =  trim($count_estado);
      }

      $query_sec = "SELECT s.secao as nome_secao, COUNT(s.secao) FROM exercicioanterior as e LEFT JOIN tb_secoes_exant as s ON e.secao_atual = s.id GROUP BY s.secao";
      $result_sec = mysqli_query($conexao, $query_sec);
      while ($res_sec = mysqli_fetch_array($result_sec)) {

        $secao = $secao . '"' . $res_sec["nome_secao"] . '",';
        $count_secao = $count_secao . '"' . $res_sec["COUNT(s.secao)"] . '",';

        $secao =  trim($secao);
        $count_secao =  trim($count_secao);
      }
    }


    function data($data)
    {
      return date("d/m/Y", strtotime($data));
    }
    ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="plugins/jQuery-Mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Initialize Select2 Elements
      $('.select2').select2()
    });
  </script>
  <!--Máscaras-->
  <script>
    $(document).ready(function() {
      $('#txtcpf').mask('000.000.000-00', {
        reverse: true
      });
      $('#txtsaram').mask('000.000-0', {
        reverse: true
      });
    });
  </script>
  <script>
    var donutChartCanvas = $('#pieChart').get(0).getContext('2d')
    var donutData = {
      labels: [
        <?php echo $direito_pleiteado ?>
      ],
      datasets: [{
        data: [<?php echo $count_direito ?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#9C0060'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: {
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'DIREITO PLEITEADO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 16
          }
        }
      }
    })
  </script>
  <script>
    var donutChartCanvas1 = $('#donutChart').get(0).getContext('2d')
    var donutData1 = {
      labels: [
        <?php echo $estado ?>
      ],
      datasets: [{
        data: [<?php echo $count_estado ?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#9C0060'],
      }]
    }
    var donutOptions1 = {
      maintainAspectRatio: false,
      responsive: true,
    }
    var donutChart1 = new Chart(donutChartCanvas1, {
      type: 'doughnut',
      data: donutData1,
      options: {
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'ESTADO DO PROCESSO'
        },
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: 'rgb(0,0,0)',
            fontSize: 16
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas1 = $('#myChart2').get(0).getContext('2d')
    var barData1 = {
      labels: [
        <?php echo $secao ?>
      ],
      datasets: [{
        data: [<?php echo $count_secao ?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#9C0060'],
      }]
    }
    var barOptions1 = {
      maintainAspectRatio: false,
      responsive: true,
    }
    var barChart1 = new Chart(barChartCanvas1, {
      type: 'bar',
      data: barData1,
      options: {
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'SEÇÃO ATUAL'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 16
          }
        }
      }
    })
  </script>
  <script>
    var barChartCanvas = $('#myChart').get(0).getContext('2d')
    var barData = {
      labels: [
        <?php echo $posto ?>
      ],
      datasets: [{
        data: [<?php echo $count_posto ?>],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#9C0060']
      }]
    }
    var barOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    var barChart = new Chart(barChartCanvas, {
      type: 'horizontalBar',
      data: barData,
      options: {
        animation: {
          duration: 2000
        },
        scales: {
          xAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              drawOnChartArea: false
            }
          }]
        },
        title: {
          display: true,
          padding: 20,
          position: 'top',
          fontColor: '#000000',
          fontSize: 16,
          text: 'QUANTIDADE X POSTO'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000000',
            fontSize: 16
          }
        }
      }
    })
  </script>
</body>

</html>