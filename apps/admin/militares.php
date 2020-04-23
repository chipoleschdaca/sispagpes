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
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="painel_admin.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="painel_admin.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="militares.php" class="nav-link active">
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
            <li class="nav-item">
              <a href="secoes_exant.php" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
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
              <a href="exercicio_anterior.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Exercício Anterior
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
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
                  <a href="estado_exant.php" class="nav-link">
                    <i class="far fa-hand-point-right nav-icon"></i>
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
      <!--/.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE SOLICITAÇÕES</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
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
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES APROVADAS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Aprovado'";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
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
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES AGUARDANDO</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Aguardando'";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
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
                <span class="info-box-icon badge-danger elevation-1"><i class="fa fa-user-times"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SOLICITAÇÕES REJEITADAS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM militares where status = 'Rejeitado'";
                      $result = mysqli_query($conexao, $query);
                      $res = mysqli_fetch_array($result);
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
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE MILITARES CADASTRADOS</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-user-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                    <!-------------LISTAR TODOS OS FUNCIONÁRIOS-------------->

                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {

                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from militares where nome LIKE '$nome' order by id asc";
                    } else {
                      $query = "select * from militares order by id asc";
                    }

                    $result = mysqli_query($conexao, $query);
                    //$dado = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);
                    ?>

                    <!-------------------------------------------------->

                    <table class="table table-sm table-bordered table-striped">
                      <thead class="text-primary align-middle">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Saram</th>
                        <th class="align-middle">CPF</th>
                        <th class="align-middle">Posto</th>
                        <th class="align-middle">Nome Completo</th>
                        <th class="align-middle">Nome de Guerra</th>
                        <th class="align-middle">Perfil</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Data</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1['id'];
                          $saram = $res_1['saram'];
                          $cpf = $res_1['cpf'];
                          $posto = $res_1['posto'];
                          $nome = $res_1['nome'];
                          $nomeguerra = $res_1['nomeguerra'];
                          $perfil = $res_1['perfil'];
                          $status = $res_1['status'];
                          $data = $res_1['data'];
                        ?>
                          <tr>
                            <td class="align-middle"><?php echo $id; ?></td>
                            <td class="align-middle"><?php echo $saram; ?></td>
                            <td class="align-middle"><?php echo $cpf; ?></td>
                            <td class="align-middle"><?php echo $posto; ?></td>
                            <td class="align-middle" style="text-transform:uppercase;"><?php echo $nome; ?></td>
                            <td class="align-middle" style="text-transform:uppercase;"><?php echo $nomeguerra; ?></td>
                            <td class="align-middle"><?php echo $perfil; ?></td>
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
                              } else if ($status == 'Rejeitado') { ?>
                                <span class="badge badge-danger">
                                  <?php echo $status; ?>
                                </span>
                              <?php
                              } else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle"><?php echo data($data); ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a class="btn btn-success btn-sm disabled" href="militares.php?func=aprova&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-dark btn-sm" href="militares.php?func=senha&id=<?php echo $id; ?>"><i class="fas fa-key"></i></a>
                                <a class="btn btn-warning btn-sm" href="militares.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-tools"></i></a>
                                <a class="btn btn-danger btn-sm" href="militares.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><i class="far fa-trash-alt"></i></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a class="btn btn-success btn-sm" href="militares.php?func=aprova&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-dark btn-sm" href="militares.php?func=senha&id=<?php echo $id; ?>"><i class="fas fa-key"></i></a>
                                <a class="btn btn-warning btn-sm" href="militares.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-tools"></i></a>
                                <a class="btn btn-danger btn-sm" href="militares.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><i class="far fa-trash-alt"></i></a>
                              <?php
                              } else { ?>
                                <a class="btn btn-success btn-sm" href="militares.php?func=aprova&id=<?php echo $id; ?>"><i class="fas fa-thumbs-up"></i></a>
                                <a class="btn btn-dark btn-sm" href="militares.php?func=senha&id=<?php echo $id; ?>"><i class="fas fa-key"></i></a>
                                <a class="btn btn-warning btn-sm" href="militares.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-tools"></i></a>
                                <a class="btn btn-danger btn-sm disabled" href="militares.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo rejeitar a solicitação?');"><i class="far fa-trash-alt"></i></a>
                              <?php } ?>
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
                  <h4 class="modal-title">Militares</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="fornecedor">Saram</label>
                      <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" required>
                    </div>
                    <div class="form-group">
                      <label for="fornecedor">CPF</label>
                      <input type="text" class="form-control mr-2" id="txtcpf" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Posto/Grad.</label>
                      <select class="form-control mr-2" name="txtposto" required>
                        <option value="" disabled selected hidden>Posto/Grad.</option>
                        <option value="PM">PM</option>
                        <option value="TB">TB</option>
                        <option value="MB">MB</option>
                        <option value="BR">BR</option>
                        <option value="CL">CL</option>
                        <option value="TC">TC</option>
                        <option value="MJ">MJ</option>
                        <option value="CP">CP</option>
                        <option value="1T">1T</option>
                        <option value="2T">2T</option>
                        <option value="AP">AP</option>
                        <option value="SO">SO</option>
                        <option value="1S">1S</option>
                        <option value="2S">2S</option>
                        <option value="3S">3S</option>
                        <option value="CB">CB</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="SD">SD</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Nome Completo</label>
                      <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Nome de Guerra</label>
                      <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Senha</label>
                      <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha" autocomplete="off" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Repita a senha</label>
                      <input type="password" class="form-control mr-2" id="txtsenha" name="txtsenha2" autocomplete="off" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Perfil</label>
                      <select name="perfil" class="form-control mr-2" id="category" name="category" required>
                        <option value="" disabled selected hidden>Perfil</option>
                        <?php
                        $query = "SELECT perfil FROM perfis ORDER BY perfil asc";
                        $result = mysqli_query($conexao, $query);
                        if (count($result)) {
                          while ($res_1 = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $res_1['perfil']; ?>"><?php echo $res_1['perfil']; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
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
      </section>
    </div>
    <footer class="main-footer">
      <?php footer() ?>
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
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
</body>

</html>

<!---------------------------------CADASTRAR-------------------------------------------->

<?php
if (isset($_POST['button'])) {
  $saram = $_POST['txtsaram'];
  $cpf = $_POST['txtcpf'];
  $posto = $_POST['txtposto'];
  $nome = strtoupper($_POST['txtnome']);
  $nomeguerra = strtoupper($_POST['txtnomeguerra']);
  $senha = md5($_POST['txtsenha']);
  $senha2 = md5($_POST['txtsenha2']);
  $perfil = $_POST['perfil'];
  $status = 'Aprovado';

  if ($senha != $senha2) {
    Alerta("info", "Senhas não conferem!", false, "militares.php");
    exit();
  }
  $query_verificar = "SELECT * FROM militares WHERE saram = '$saram' OR cpf = '$cpf'";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Militar já cadastrado!", false, "militares.php");
    exit();
  }

  $query = "INSERT INTO militares (saram, cpf, posto, nome, nomeguerra, senha, perfil, status, data) VALUES ('$saram', '$cpf', '$posto', '$nome', '$nomeguerra', '$senha','$perfil', '$status', curDate() )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Ocorreu algum erro ao cadastrar!", false, "militares.php");
  } else {
    Alerta("success", "Salvo com sucesso", false, "militares.php");
  }

  //EXCLUIR REGISTRO DA TABELA
} elseif (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "UPDATE militares SET status = 'Rejeitado' WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso", false, "militares.php");

  //ALTERAR SENHA
} elseif (@$_GET['func'] == 'senha') {
  $id = $_GET['id'];
  $query = "SELECT * FROM militares WHERE id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) { ?>
    <div id="modalSenha" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Senha</label>
                <input type="text" class="form-control mr-2" id="txtsenhaatual" name="txtsenhaatual" autocomplete="off" value="<?php echo $res_1['senha']; ?>" disabled>
              </div>
              <div class="form-group">
                <label for="fornecedor">Nova Senha</label>
                <input type="password" class="form-control mr-2" id="txtnovasenha1" name="txtnovasenha1" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="fornecedor">Repita a Senha</label>
                <input type="password" class="form-control mr-2" id="txtnovasenha2" name="txtnovasenha2" autocomplete="off">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" name="buttonSenha" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#modalSenha').modal("show");
    </script>
    <!--Modal SENHA -->
    <?php
    if (isset($_POST['buttonSenha'])) {
      $senhaatual = $_POST['txtsenhaatual'];
      $novasenha1 = md5($_POST['txtnovasenha1']);
      $novasenha2 = md5($_POST['txtnovasenha2']);

      if ($novasenha1 != $novasenha2) {
        Alerta("info", "Senhas não conferem!", false, "militares.php");
      } else {
        $query_editar = "UPDATE militares set senha = '$novasenha1' WHERE id = '$id'";

        $result_editar = mysqli_query($conexao, $query_editar);

        if ($result_editar == '') {
          Alerta("error", "Não foi possível alterar!", false, "militares.php");
        } else {
          Alerta("success", "Editado com sucesso!", false, "militares.php");
        }
      }
    }
  }

  //EDITAR REGISTRO DA TABELA
} elseif (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "SELECT * FROM militares WHERE id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) { ?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Saram</label>
                <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?php echo $res_1['saram']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                <input type="text" class="form-control mr-2" id="txtcpf2" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?php echo $res_1['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Posto/Grad.</label>
                <select class="form-control mr-2" name="txtposto" required>
                  <option value="" disabled selected hidden><?php echo $res_1['posto']; ?></option>
                  <option value="PM">PM</option>
                  <option value="TB">TB</option>
                  <option value="MB">MB</option>
                  <option value="BR">BR</option>
                  <option value="CL">CL</option>
                  <option value="TC">TC</option>
                  <option value="MJ">MJ</option>
                  <option value="CP">CP</option>
                  <option value="1T">1T</option>
                  <option value="2T">2T</option>
                  <option value="AP">AP</option>
                  <option value="SO">SO</option>
                  <option value="1S">1S</option>
                  <option value="2S">2S</option>
                  <option value="3S">3S</option>
                  <option value="CB">CB</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="SD">SD</option>
                </select>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Guerra</label>
                <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" value="<?php echo $res_1['nomeguerra']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Perfil</label>
                <select name="perfil" class="form-control mr-2" id="category" name="category" required>
                  <option value="" disabled selected hidden><?php echo $res_1['perfil']; ?></option>
                  <?php
                  $query = "SELECT perfil FROM perfis ORDER BY perfil asc";
                  $result = mysqli_query($conexao, $query);
                  if (count($result)) {
                    while ($res_2 = mysqli_fetch_array($result)) {
                  ?>
                      <option value="<?php echo $res_2['perfil']; ?>"><?php echo $res_2['perfil']; ?></option>
                  <?php }
                  } ?>
                </select>
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
    <script>
      $('#modalEditar').modal("show");
    </script>

    <!--Modal EDITAR -->

    <?php
    if (isset($_POST['buttonEditar'])) {
      $saram = $_POST['txtsaram'];
      $cpf = $_POST['txtcpf'];
      $posto = $_POST['txtposto'];
      $nome = strtoupper($_POST['txtnome']);
      $nomeguerra = strtoupper($_POST['txtnomeguerra']);
      $perfil = $_POST['perfil'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "SELECT * FROM militares WHERE saram = '$saram' OR cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          Alerta("info", "Militar já cadastrado!", false, "militares.php");
          exit();
        }
      }

      $query_editar = "UPDATE militares set saram = '$saram', cpf = '$cpf', posto = '$posto', nome = '$nome', nomeguerra = '$nomeguerra', perfil = '$perfil' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar", false, "militares.php");
      } else {
        Alerta("success", "Editado com sucesso", false, "militares.php");
      }
    }
  }

  // APROVAR NOVA SOLICITAÇÃO
} elseif (@$_GET['func'] == 'aprova') {
  $id = $_GET['id'];
  $query = "select * from militares where id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) { ?>
    <div id="modalAprovar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Militares</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Saram</label>
                <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?php echo $res_1['saram']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                <input type="text" class="form-control mr-2" id="txtcpf2" name="txtcpf" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?php echo $res_1['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Posto/Grad.</label>
                <select class="form-control mr-2" name="txtposto" required>
                  <option value="" disabled selected hidden><?php echo $res_1['posto']; ?></option>
                  <option value="PM">PM</option>
                  <option value="TB">TB</option>
                  <option value="MB">MB</option>
                  <option value="BR">BR</option>
                  <option value="CL">CL</option>
                  <option value="TC">TC</option>
                  <option value="MJ">MJ</option>
                  <option value="CP">CP</option>
                  <option value="1T">1T</option>
                  <option value="2T">2T</option>
                  <option value="AP">AP</option>
                  <option value="SO">SO</option>
                  <option value="1S">1S</option>
                  <option value="2S">2S</option>
                  <option value="3S">3S</option>
                  <option value="CB">CB</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="SD">SD</option>
                </select>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Guerra</label>
                <input type="text" class="form-control mr-2" id="txtnomeguerra" name="txtnomeguerra" autocomplete="off" placeholder="Nome de Guerra" value="<?php echo $res_1['nomeguerra']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Perfil</label>
                <select name="perfil" class="form-control mr-2" id="category" name="category" required>
                  <option value="" disabled selected hidden><?php echo $res_1['perfil']; ?></option>
                  <?php
                  $query = "SELECT perfil FROM perfis ORDER BY perfil asc";
                  $result = mysqli_query($conexao, $query);
                  if (count($result)) {
                    while ($res_2 = mysqli_fetch_array($result)) {
                  ?>
                      <option value="<?php echo $res_2['perfil']; ?>"><?php echo $res_2['perfil']; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm" name="buttonAprovar" style="text-transform: capitalize;"><i class="fas fa-check"></i> Aprovar</button>
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('#modalAprovar').modal("show");
    </script>
    <!--Modal Aprovar -->
<?php
    if (isset($_POST['buttonAprovar'])) {
      $saram = $_POST['txtsaram'];
      $cpf = $_POST['txtcpf'];
      $posto = $_POST['txtposto'];
      $nome = strtoupper($_POST['txtnome']);
      $nomeguerra = strtoupper($_POST['txtnomeguerra']);
      $perfil = $_POST['perfil'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "select * from militares where cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          Alerta("info", "CPF já cadastrado!", false, "militares.php");
          exit();
        }
      }

      $query_editar = "UPDATE militares set status = 'Aprovado' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        Alerta("error", "Não foi possível alterar", false, "militares.php");
      } else {
        Alerta("success", "Aprovado com sucesso!", false, "militares.php");
      }
    }
  }
} ?>

<!--Máscaras-->
<script>
  $(document).ready(function() {
    $('#txtcpf').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtsaram').mask('000.000-0', {
      reverse: true
    });
    $('#txtcpf2').mask('000.000.000-00', {
      reverse: true
    });
    $('#txtsaram2').mask('000.000-0', {
      reverse: true
    });
  });
</script>