<?php
session_start();
include('../../../verificar_login.php');
include('../../../conexao.php');
if ($_SESSION['perfil_usuario'] != 'EXANT') {
  header('Location: ../../../index.php');
  exit();
}
function AnoAtual()
{
  echo date("Y") . " ";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../../../dist/img/gapls.png">
  <title>SISPAGPES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.css">
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
      </ul>
      <ul class="navbar-nav ml-auto">
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
            <a class="dropdown-item" href="../../../logout.php" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Sair
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="painel_exant.php" class="brand-link">
        <img src="../../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="painel_exant.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Página Inicial
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Exercício Anterior</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="requerentes.php" class="nav-link active">
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
      <!--/.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE REGISTROS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM requerentes";
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
          <th>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header" style="text-align: center;">
                    <h4 class="" style="text-align:center;"><strong>TABELA DE REQUERENTES</strong></h4>
                  </div>
                  <div class="card-body">
                    <div class="row" style="margin-bottom: 20px;">
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                          <i class="fas fa-user-plus"></i> Inserir Novo
                        </button>
                      </div>
                      <div class="col-sm-6">
                        <!-- SEARCH FORM -->
                        <form class="form-inline">
                          <label for="">Filtros: </label>
                          <div class="input-group input-group-sm" style="margin-left: 10px; border-radius: 15px;">
                            <input class="form-control" type="search" id="txtsaram3" name="txtsaram3" placeholder="SARAM" aria-label="Pesquisar" style="border-radius:3px; margin-right: 20px;">
                            <input class="form-control" type="search" id="txtcpf3" name="txtcpf3" placeholder="CPF" aria-label="Pesquisar" style="border-radius:3px; margin-right: 20px;">
                            <input class="form-control" type="search" id="txtpesquisar" name="txtpesquisar" placeholder="Nome" aria-label="Pesquisar" style="border-radius:3px; margin-right: 5px;">
                            <div class="input-group-append">
                              <button class="btn btn-navbar" type="submit" name="buttonPesquisar">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                      <!-------------LISTAR TODOS OS PROCESSOS-------------->
                      <?php
                      if (isset($_GET['buttonPesquisar']) and $_GET['txtsaram3'] != '') {
                        $nome = '%' . $_GET['txtsaram3'] . '%';
                        $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE saram LIKE '$nome' order by nome asc";
                      } else if (isset($_GET['buttonPesquisar']) and $_GET['txtcpf3'] != '') {
                        $nome = '%' . $_GET['txtcpf3'] . '%';
                        $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE cpf LIKE '$nome' order by nome asc";
                      } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                        $nome = '%' . $_GET['txtpesquisar'] . '%';
                        $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE nome LIKE '$nome' order by nome asc";
                      } else {
                        $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id ORDER BY nome asc";
                      }
                      $result = mysqli_query($conexao, $query);
                      $row = mysqli_num_rows($result);
                      ?>
                      <table class="table table-sm table-bordered table-striped">
                        <thead class="text-primary">
                          <th class="align-middle">#</th>
                          <th class="align-middle">Saram</th>
                          <th class="align-middle">CPF</th>
                          <th class="align-middle">Posto</th>
                          <th class="align-middle">Situação</th>
                          <th class="align-middle">Nome Completo</th>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Data</th>
                          <th class="align-middle">Ações</th>
                        </thead>
                        <tbody>
                          <?php
                          while ($res_1 = mysqli_fetch_array($result)) {
                            $id = $res_1['req_id'];
                            $saram = $res_1['saram'];
                            $cpf = $res_1['cpf'];
                            $posto = $res_1['posto'];
                            $situacao = $res_1['situacao'];
                            $nome = $res_1['nome'];
                            $email = $res_1['email'];
                            $data = $res_1['data'];
                            $data2 = implode('/', array_reverse(explode('-', $data)));
                          ?>
                            <tr>
                              <td class="align-middle"><?php echo $id; ?></td>
                              <td class="align-middle"><?php echo $saram; ?></td>
                              <td class="align-middle"><?php echo $cpf; ?></td>
                              <td class="align-middle"><?php echo $posto; ?></td>
                              <td class="align-middle"><?php echo $situacao; ?></td>
                              <td class="align-middle"><?php echo '<a class="nav-link" href="requerentes.php?func=consulta&id=' . $id . '&cpf=' . $cpf . '" ?>'; ?><?php echo $nome; ?></td>
                              <td class="align-middle"><?php echo $email; ?></td>
                              <td class="align-middle"><?php echo $data2; ?></td>
                              <td class="align-middle">
                                <a class="btn btn-info btn-sm" href="requerentes.php?func=consulta&id=<?php echo $id; ?>&cpf=<?php echo $cpf ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-warning btn-sm" href="requerentes.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-cog"></i></a>
                                <a class="btn btn-danger btn-sm" href="requerentes.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <?php
                      if ($row == '') {
                        echo "<h3>Não existem dados para consulta</h3>";
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </th>
        </div>
      </section>
      <!-----------------------------------------------------------------------------------------------MODAL--------------------------------------------------------------------------------------------------->
      <div id="modalExemplo" name="modalExemplo" class="modal fade" role="dialog">
        <!---Modal Exemplo--->
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Requerentes</h4>
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
                  <input type="text" class="form-control mr-2 cpf-mask" id="txtcpf" name="txtcpf" autocomplete="off" data-mask="000.000.000-00" maxlength="14" placeholder="000.000.000-00" required>
                </div>
                <div class="form-group">
                  <label for="id_produto">Posto</label>
                  <select class="form-control mr-2" name="txtposto" required>
                    <option value="" disabled selected hidden>Selecione o posto...</option>
                    <?php
                    $query_posto = "SELECT * FROM tb_posto where status = 'Aprovado'";
                    $result_posto = mysqli_query($conexao, $query_posto);
                    if (count($result_posto)) {
                      while ($res_p = mysqli_fetch_array($result_posto)) {
                        $id = $res_p['id'];
                        $posto = $res_p['posto'];
                    ?>
                        <option value="<?php echo $id ?>"><?php echo $posto ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id_produto">Situação</label><br>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="ativo" name="txtsituacao" value="AT" required>
                    <label class="custom-control-label" style="cursor: pointer; text-align: left;" for="ativo"><span></span>Ativo</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="inativo" name="txtsituacao" value="R1" required>
                    <label class="custom-control-label" style="cursor: pointer;" for="inativo"><span></span>Inativo</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="reformado" name="txtsituacao" value="PM" required>
                    <label class="custom-control-label" style="cursor: pointer; text-align: right;" for="reformado"><span></span>Pensionista</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_produto">Nome Completo</label>
                  <input type="text" class="form-control mr-2" id="txtnome" name="txtnome" autocomplete="off" placeholder="Nome Completo" required>
                </div>
                <div class="form-group">
                  <label for="fornecedor">E-mail</label>
                  <input type="email" class="form-control mr-2" id="txtemail" name="txtemail" autocomplete="off" placeholder="Email">
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
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2019-<?php AnoAtual() ?><a href="#">GAP-LS</a>.</strong>
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
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery Mask -->
  <script src="../../../plugins/jQuery-Mask/dist/jquery.mask.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../plugins/moment/moment.min.js"></script>
  <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../../dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../../dist/js/demo.js"></script>

  <!-----------------FILTRO PARA PESQUISAR EM QUALQUER COLUNA DA TABELA (JQuery)------------------->

  <!---------------------------------------------------------------------------------------------->
</body>
<style>
  /* The container */
  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input~.checkmark {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container input:checked~.checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container input:checked~.checkmark:after {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container .checkmark:after {
    top: 7px;
    left: 7px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: white;
  }
</style>

</html>
<!------------CADASTRAR------------>
<?php
if (isset($_POST['button'])) {
  $posto = $_POST['txtposto'];
  $situacao = $_POST['txtsituacao'];
  $nome = strtoupper($_POST['txtnome']);
  $email = strtolower($_POST['txtemail']);
  $saram = $_POST['txtsaram'];
  $cpf = $_POST['txtcpf'];


  //Verificar se o CPF já está cadastrado

  $query_verificar = "select * from requerentes where cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('CPF já Cadastrado!'); </script>";
    exit();
  }

  $query = "INSERT into requerentes (saram, cpf, posto, situacao, nome, email, data) VALUES ('$saram', '$cpf', '$posto', '$situacao', '$nome', '$email', curDate() )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
    echo "<script language='javascript'> window.location='requerentes.php'; </script>";
  } else {
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='requerentes.php'; </script>";
  }
}
?>

<!---------------------------EXCLUIR REGISTRO DA TABELA--------------------------->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "DELETE FROM requerentes where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='requerentes.php'; </script>";
}
?>
<!-------------------------------------------------------------------------------->

<!---------------------------EDITAR REGISTRO DA TABELA---------------------------->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "SELECT * from requerentes where id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Requerentes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="fornecedor">Saram</label>
                <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram2" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?php echo $res_1['saram']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">CPF</label>
                <input type="text" class="form-control mr-2 cpf-mask" id="txtcpf2" name="txtcpf2" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?php echo $res_1['cpf']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Posto</label>
                <select class="form-control mr-2" name="txtposto2" required>
                  <option value="" disabled selected hidden><?php echo $res_1['posto']; ?></option>
                  <option value="" disabled selected hidden>Selecione o posto...</option>
                  <?php
                  $query_posto = "SELECT * FROM tb_posto where status = 'Aprovado'";
                  $result_posto = mysqli_query($conexao, $query_posto);
                  if (count($result_posto)) {
                    while ($res_p = mysqli_fetch_array($result_posto)) {
                      $id_p = $res_p['id'];
                      $posto = $res_p['posto'];
                  ?>
                      <option value="<?php echo $id_p ?>"><?php echo $posto ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_produto">Situação</label><br>
                <div class="custom-control custom-radio">
                  <label class="container">Ativo
                    <input type="radio" value="AT" name="txtsituacao2">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <label class="container">Inativo
                    <input type="radio" value="R1" name="txtsituacao2">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <label class="container">Pensionista
                    <input type="radio" value="PM" name="txtsituacao2">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="id_produto">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome" name="txtnome2" autocomplete="off" placeholder="Nome Completo" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">E-mail</label>
                <input type="email" class="form-control mr-2" id="txtemail" name="txtemail2" autocomplete="off" value="<?php echo $res_1['email']; ?>" placeholder="Email">
              </div>
            </form>
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
      $posto = $_POST['txtposto2'];
      $situacao = $_POST['txtsituacao2'];
      $nome = strtoupper($_POST['txtnome2']);
      $email = strtolower($_POST['txtemail2']);
      $saram = $_POST['txtsaram2'];
      $cpf = $_POST['txtcpf2'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "select * from requerentes where cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          echo "<script language='javascript'> window.alert('CPF já está cadastrado!'); </script>";
          exit();
        }
      }

      $query_editar = "UPDATE requerentes set posto = '$posto', situacao = '$situacao', nome = '$nome', email = '$email', saram = '$saram', cpf = '$cpf' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao editar!'); </script>";
        echo "<script language='javascript'> window.location='requerentes.php'; </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com sucesso!'); </script>";
        echo "<script language='javascript'> window.location='requerentes.php'; </script>";
      }
    }
  }
} ?>

<!--Consultar Processos-->
<?php
if (@$_GET['func'] == 'consulta') {
  $id = $_GET['id'];
  $query = "select * from requerentes where id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
?>
    <div id="modalConsultar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <?php
            $cpf = $_GET['cpf'];
            $query = "SELECT r.posto, r.situacao, r.nome, p.id, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON p.id = r.posto where cpf = '$cpf'";
            $result = mysqli_query($conexao, $query);
            $row = mysqli_num_rows($result);
            $res_1 = mysqli_fetch_array($result);
            $nome = $res_1['nome'];
            $posto = $res_1['nome_posto'];
            $situacao = $res_1['situacao'];
            ?>
            <h4 class="modal-title" style="text-align:center; width: 100%;">Dados do(a): <strong><?php echo $posto, " ", $situacao, " ", $nome ?></strong></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
              <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->
              <?php
              $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.requerente = '$id' ORDER BY e.id asc";
              $result = mysqli_query($conexao, $query);
              ?>
              <table class="table table-sm table-bordered table-striped">
                <thead class="text-primary">
                  <th class="align-middle">#</th>
                  <th class="align-middle">Protocolo (NUP)</th>
                  <th class="align-middle">Dt. Abertura</th>
                  <th class="align-middle">Direito Pleiteado</th>
                  <th class="align-middle">Seção de Origem</th>
                  <th class="align-middle">Estado do Processo</th>
                  <th class="align-middle">Seção Atual</th>
                </thead>
                <tbody>
                  <?php
                  function data($data)
                  {
                    return date("d/m/Y", strtotime($data));
                  }
                  while ($res_1 = mysqli_fetch_array($result)) {
                    $id = $res_1['id'];
                    $nup = $res_1["nup"];
                    $data_criacao = $res_1["data_criacao"];
                    $direito_pleiteado = $res_1["dir_direito"];
                    $secao_origem = $res_1["sec_origem"];
                    $estado = $res_1["est_estado"];
                    $secao_atual = $res_1['sec_atual'];
                  ?>
                    <tr>
                      <td class="align-middle"><?php echo $id; ?></td>
                      <td class="align-middle"><?php echo $nup; ?></td>
                      <td class="align-middle"><?php echo data($data_criacao); ?></td>
                      <td class="align-middle"><?php echo $direito_pleiteado; ?></td>
                      <td class="align-middle"><?php echo $secao_origem; ?></td>
                      <td class="align-middle"><?php echo $estado; ?></td>
                      <td class="align-middle"><?php echo $secao_atual; ?></td>
                      <!--<td class="align-middle">R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></td>-->
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php
              if ($row == '') {
                echo "<h3>Não existem dados cadastrados no banco</h3>";
              } ?>
            </div>
            <form method="POST" action="">
              <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
        $('#modalConsultar').modal("show");
      </script>
      <!--Modal CONSULTAR -->
  <?php
    if (isset($_POST['buttonConsultar'])) {
      $posto = $_POST['txtposto'];
      $situacao = $_POST['txtsituacao'];
      $nome = strtoupper($_POST['txtnome']);
      $email = strtolower($_POST['txtemail']);
      $saram = $_POST['txtsaram'];
      $cpf = $_POST['txtcpf'];

      if ($res_1['cpf'] != $cpf) {

        //Verificar se o CPF já está cadastrado
        $query_verificar = "SELECT * FROM requerentes WHERE cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          echo "<script language='javascript'> window.alert('O CPF já está cadastrado!'); </script>";
          exit();
        }
      }

      $query_editar = "UPDATE requerentes set posto = '$posto', situacao = '$situacao', nome = '$nome', email = '$email', saram = '$saram', cpf = '$cpf' where id = '$id'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao editar!'); </script>";
        echo "<script language='javascript'> window.location='requerentes.php'; </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com sucesso!'); </script>";
        echo "<script language='javascript'> window.location='requerentes.php'; </script>";
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
      $('#txtcpf3').mask('000.000.000-00', {
        reverse: true
      });
      $('#txtsaram3').mask('000.000-0', {
        reverse: true
      });
    });
  </script>