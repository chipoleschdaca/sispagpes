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
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Toastr -->
  <script src="../../plugins/toastr/toastr.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
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
            <a class="dropdown-item" href="../../logout.php" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Sair
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="painel_admin.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_admin.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="militares.php" class="nav-link">
                <i class="nav-icon fas fa-fingerprint"></i>
                <p>
                  Militares
                  <?php
                  $query = "SELECT * FROM militares where status = 'Aguardando'";
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
              <a href="perfis.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Perfis
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Exercício Anterior
                  <?php
                  $query = "SELECT * FROM tb_secoes_exant where status = 'Aguardando'";
                  $result = mysqli_query($conexao, $query);
                  $res = mysqli_fetch_array($result);
                  $row = mysqli_num_rows($result);
                  $query2 = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aguardando'";
                  $result2 = mysqli_query($conexao, $query2);
                  $res2 = mysqli_fetch_array($result2);
                  $row2 = mysqli_num_rows($result2);
                  $query3 = "SELECT * FROM tb_estado_exant where status = 'Aguardando'";
                  $result3 = mysqli_query($conexao, $query3);
                  $res3 = mysqli_fetch_array($result3);
                  $row3 = mysqli_num_rows($result3);
                  $query4 = "SELECT * FROM tb_posto where status = 'Aguardando'";
                  $result4 = mysqli_query($conexao, $query4);
                  $res4 = mysqli_fetch_array($result4);
                  $row4 = mysqli_num_rows($result4);
                  $row_sum = $row + $row2 + $row3 + $row4;
                  if ($row_sum > 0) {
                    echo '<i class="right fas fa-angle-left"></i>';
                    echo '<span class="badge badge-warning right">' . $row_sum . '</span>';
                  } else {
                    echo '<i class="right fas fa-angle-left"></i>';
                  }
                  ?>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="secoes_exant.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>
                      Seções
                      <?php
                      $query = "SELECT * FROM tb_secoes_exant where status = 'Aguardando'";
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
                  <a href="direitos_exant.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>
                      Direito Pleiteado
                      <?php
                      $query = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aguardando'";
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
                  <a href="estado_exant.php" class="nav-link active">
                    <i class="fas fa-hand-point-right nav-icon"></i>
                    <p>
                      Estado
                      <?php
                      $query = "SELECT * FROM tb_estado_exant where status = 'Aguardando'";
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
                  <a href="posto.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
                    <p>
                      Posto
                      <?php
                      $query = "SELECT * FROM tb_posto where status = 'Aguardando'";
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
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-database"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">ESTADOS CADASTRADOS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_estado_exant";
                      $result = mysqli_query($conexao, $query);
                      $row = mysqli_num_rows($result);
                      echo $row;
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">ESTADOS "APROVADOS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_estado_exant where status = 'Aprovado'";
                      $result = mysqli_query($conexao, $query);
                      $row = mysqli_num_rows($result);
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
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-history"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">ESTADOS "AGUARDANDO"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_estado_exant where status = 'Aguardando'";
                      $result = mysqli_query($conexao, $query);
                      $row = mysqli_num_rows($result);
                      echo $row;
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">ESTADOS "EXCLUÍDOS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_estado_exant where status = 'Excluído'";
                      $result = mysqli_query($conexao, $query);
                      $row = mysqli_num_rows($result);
                      echo $row;
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br><br>
          <div class="row" style="align-content: center;">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE ESTADOS</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <!----------------------LISTAR TODOS OS ESTADOS-------------------------->

                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from tb_estado_exant where estado LIKE '$nome' order by estado asc";
                    } else {
                      $query = "select * from tb_estado_exant where status <> 'Excluído' order by estado asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);
                    ?>
                    <!-------------------------------------------------->
                    <table class="table table-sm table-bordered table-striped">
                      <thead class="text-primary" style="text-align: center; width: 800px; height: 500px; overflow: auto;">
                        <th class="align-middle" style="width: 4%;">#</th>
                        <th class="align-middle" style="width: 65%;">Nome do Status</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $nome = $res_1["estado"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $nome; ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a class="btn btn-success btn-xs disabled" href="#"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs" href="rel/invoice-print.php?id=<?php echo $id; ?>" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a class="btn btn-success btn-xs" href="estado_exant.php?func=aprova&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs disabled" href="#" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } elseif ($status == 'Excluído') { ?>
                                <a class="btn btn-success btn-xs" href="estado_exant.php?func=aprova&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR a seção?');"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs disabled" href="#" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs disabled" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs disabled" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } else {
                                echo $status;
                              } ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {
                      echo "<h3>Não existem dados para consulta</h3>";
                    } else {
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <div class="card collapsed-card">
                <div class="card-header" style="text-align: center; align-items: center;">
                  <h3 class="card-title">ESTADOS EXCLUÍDOS</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <!----------------------LISTAR TODOS OS USUÁRIOS-------------------------->

                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from tb_estado_exant where estado LIKE '$nome' order by id asc";
                    } else {
                      $query = "select * from tb_estado_exant where status = 'Excluído' order by id asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    ?>

                    <!-------------------------------------------------->

                    <table class="table table-sm table-bordered table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle" style="width: 4%;">#</th>
                        <th class="align-middle" style="width: 65%;">Estados</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $nome = $res_1["estado"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $nome; ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a class="btn btn-success btn-xs disabled" href="#"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs" href="rel/invoice-print.php?id=<?php echo $id; ?>" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a class="btn btn-success btn-xs" href="estado_exant.php?func=aprova&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs disabled" href="#" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } elseif ($status == 'Excluído') { ?>
                                <a class="btn btn-success btn-xs" href="estado_exant.php?func=aprova&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR o status?');"><i class="fas fa-thumbs-up" style="width: 14px;"></i></a>
                                <a class="btn btn-primary btn-xs disabled" href="#" target="_blank" rel=”noopener”><i class="fas fa-print" style="width: 14px;"></i></a>
                                <a class="btn btn-warning btn-xs disabled" href="estado_exant.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog" style="width: 14px;"></i></a>
                                <a class="btn btn-danger btn-xs disabled" href="estado_exant.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt" style="width: 14px;"></i></a>
                              <?php
                              } else {
                                echo $status;
                              } ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    if ($row == '') {
                      echo "<h3>Não existem dados para consulta</h3>";
                    } else {
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="modalExemplo" class="modal fade" role="dialog">
            <!---Modal Exemplo--->
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inserir novo ESTADO</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Estado do Processo</label>
                      <input type="text" class="form-control mr-2" name="txtnome" placeholder="Digite um novo status" autocomplete="off" required>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm" name="button" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                      <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php footer() ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="../../plugins/jquery-mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../plugins/moment/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>

  <!-----------------FILTRO PARA PESQUISAR EM QUALQUER COLUNA DA TABELA (JQuery)------------------->

  <!---------------------------------------------------------------------------------------------->
</body>

</html>

<!---------------------------------CADASTRAR-------------------------------------------->

<?php
if (isset($_POST['button'])) {
  $nome = strtoupper($_POST['txtnome']);
  $status = 'Aprovado';

  //Verificar se a SEÇÃO já está cadastrado

  $query_verificar = "select * from tb_estado_exant where estado = '$nome'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Estado já cadastrado!", false, "estado_exant.php");
    exit();
  }

  $query = "INSERT into tb_estado_exant (estado, status) VALUES ('$nome', '$status')";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar", false, "estado_exant.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "estado_exant.php");
  }
}

?>


<!--------------------------EXCLUIR REGISTRO DA TABELA--------------------------->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "UPDATE tb_estado_exant set status = 'Excluído' where id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso!", false, "estado_exant.php");
}
?>
<!------------------------------------------------------------------------------->


<!---------------------------EDITAR REGISTRO DA TABELA---------------------------->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from tb_estado_exant where id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar Estado</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Estado</label>
                <input type="text" class="form-control mr-2" name="txtnome2" value="<?php echo $res_1['estado']; ?>" placeholder="Digite o estado..." autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="buttonEditar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <script>
      $('#modalEditar').modal("show");
    </script>
    <!--Modal EDITAR -->

    <!-------------------------------------------------------------------------------Comando para alterar os dados da tabela--------------------------------------------------------------------------------->

<?php
    if (isset($_POST['buttonEditar'])) {
      $nome2 = strtoupper($_POST['txtnome2']);
      $query_verificar = "select * from tb_estado_exant where estado = '$nome2'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
      $result_verificar = mysqli_query($conexao, $query_verificar);
      $row_verificar = mysqli_num_rows($result_verificar);

      if ($row_verificar > 0) {
        Alerta("info", "Estado já cadastrado!", false, "estado_exant.php");
        exit();
      }

      $query_editar = "UPDATE tb_estado_exant set estado = '$nome2' where id = '$id'";
      $result_editar = mysqli_query($conexao, $query_editar);
      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar!", false, "estado_exant.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "estado_exant.php");
      }
    }
  }
}

//<!---------------------------APROVAR NOVO ESTADO NA TABELA---------------------------->

if (@$_GET['func'] == 'aprova') {
  $id = $_GET['id'];
  $query = "UPDATE tb_estado_exant set status = 'Aprovado' where id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Aprovado com sucesso!", false, "estado_exant.php");
}
?>