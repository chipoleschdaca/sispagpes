<?php
include('conexao.php');
session_start();
include('verificar_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="dist/img/gapls.png">
  <title>SISPAGPES | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Início</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contato</a>
        </li>
      </ul>
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Pesquisar" id="txtpesquisar" name="txtpesquisar" aria-label="Pesquisar" style="margin-right:10px;">
          <input name="txtpesquisar" id="txtpesquisar" class="form-control form-control-navbar" type="date" placeholder="Pesquisar" aria-label="Pesquisar">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit" name="buttonPesquisar">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Right navbar links -->
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
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="painel_admin.php" class="brand-link" style="heigh:50px;">
        <img src="dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) 
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="painel_funcionario.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="requerentes_orc.php" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                  Requerentes
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <!--Se quiser deixar o menu aberto, acrescentar menu-open após o treeview-->
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Orçamentos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="abrir_orcamentos.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Abrir Orçamento</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="fechar_orcamentos.php" class="nav-link active">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>Fechar Orçamento</p>
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
      </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE ORÇAMENTOS ABERTOS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM orcamentos where status = 'Aberto'";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
                      $row = mysqli_num_rows($result);
                      ?>
                      <?php
                      echo $row;
                      ?>
                    </h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">
                    <h4>41,410</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">
                    <h4>760</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">
                    <h4>2,000</h4>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <?php
                  $cpf = $_GET['cpf'];
                  $query = "select * from requerentes where cpf = '$cpf'";
                  $result = mysqli_query($conexao, $query);
                  //$dado = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  $res_1 = mysqli_fetch_array($result);
                  $nome = $res_1['nome'];
                  ?>
                  <h4 class="" style="text-align:center;">ORÇAMENTOS DO(A) <strong><?php echo $nome ?></strong></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                    <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->

                    <?php
                    $cpf = $_GET['cpf'];
                    $query = "select * from orcamentos where requerente = '$cpf'";
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);

                    ?>

                    <table class="table table-sm table-bordered table-striped">
                      <thead class="text-primary">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Produto</th>
                        <th class="align-middle">Problema</th>
                        <th class="align-middle">Valor Total</th>
                        <th class="align-middle">Data de Abertura</th>
                        <th class="align-middle">Data de Aprovação</th>
                        <th class="align-middle">Status</th>
                      </thead>
                      <tbody>
                        <?php
                        function data($data)
                        {
                          return date("d/m/Y", strtotime($data));
                        }
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1['id'];
                          $produto = $res_1["produto"];
                          $defeito = $res_1["problema"];
                          $valor_total = $res_1["valor_total"];
                          $status = $res_1["status"];
                          $data_abertura = $res_1['data_abertura'];
                          $data_aprovacao = $res_1['data_aprovacao'];
                        ?>
                          <tr>
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $produto; ?></td>
                            <td class="align-middle"><?php echo $defeito; ?></td>
                            <td class="align-middle">R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></td>
                            <td class="align-middle"><?php echo data($data_abertura); ?></td>
                            <td class="align-middle">
                              <?php
                              if ($data_aprovacao >= 2019) {
                                echo data($data_aprovacao);
                              } else {
                                echo "Não há";
                              }
                              ?>
                            </td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aberto') { ?>
                                <span class="badge badge-secondary">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } elseif ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } elseif ($status == 'Cancelado') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else {
                                echo $status;
                              }
                              ?>
                            </td>
                          </tr>

                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {
                      echo "<h3>Não existem dados cadastrados no banco</h3>";
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          Obs.: A Ordem de Serviço é gerada automaticamente quando o Orçamento é aprovado.
          <br>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <?php
                  $cpf = $_GET['cpf'];
                  $query = "select * from requerentes where cpf = '$cpf'";
                  $result = mysqli_query($conexao, $query);
                  //$dado = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  $res_1 = mysqli_fetch_array($result);
                  $nome = $res_1['nome'];
                  ?>
                  <h4 class="" style="text-align:center;">ORDENS DE SERVIÇO DO(A) <strong><?php echo $nome ?></strong></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->
                    <?php
                    $cpf = $_GET['cpf'];
                    $query = "select * from os where requerente = '$cpf'";
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);
                    ?>
                    <table class="table table-sm table-bordered table-striped">
                      <thead class="text-primary">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Produto</th>
                        <th class="align-middle">Garantia</th>
                        <th class="align-middle">Valor Total</th>
                        <th class="align-middle">Data de Abertura</th>
                        <th class="align-middle">Data de Fechamento</th>
                        <th class="align-middle">Status</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1['id'];
                          $produto = $res_1["produto"];
                          $defeito = $res_1["problema"];
                          $valor_total = $res_1["total"];
                          $status = $res_1["status"];
                          $garantia = $res_1["garantia"];
                          $data_abertura = $res_1['data_abertura'];
                          $data_fechamento = $res_1['data_fechamento'];
                        ?>
                          <tr>
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $produto; ?></td>
                            <td class="align-middle"><?php echo $garantia; ?></td>
                            <td class="align-middle">R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></td>
                            <td class="align-middle"><?php echo data($data_abertura); ?></td>
                            <td class="align-middle">
                              <?php
                              if ($data_aprovacao >= 2019) {
                                echo data($data_aprovacao);
                              } else {
                                echo "Não há";
                              }
                              ?>
                            </td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aberta') { ?>
                                <span class="badge badge-secondary">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } elseif ($status == 'Aprovada') { ?>
                                <span class="badge badge-success">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } elseif ($status == 'Cancelada') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else {
                                echo $status;
                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {
                      echo "<h3>Não existem dados cadastrados no banco</h3>";
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">GAP-LS</a>.</strong>
      Desenvolvido por DANIEL ANGELO CHIPOLESCH DE ALMEIDA 1º Ten Int. All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Versão</b> 1.0.0
      </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
</body>

</html>