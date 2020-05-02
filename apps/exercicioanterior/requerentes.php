<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('EXANT', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php head('../../') ?>
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
      <a href="painel_exant.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
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
          <div>
            <button type="button" class="general-btn" data-toggle="modal" data-target="#modalExemplo" data-tt="tooltip" title="Inserir Requerente" style="background-color: white;">
              <img src="../../dist/icons/add_business_user.svg" />
            </button>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="" style="text-align:center;"><strong>TABELA DE REQUERENTES</strong></h4>
                </div>
                <div class="card-body">
                  <div class="row" style="margin-bottom: 20px;">
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
                      $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.dt_nascimento, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE saram LIKE '$nome' order by nome asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtcpf3'] != '') {
                      $nome = '%' . $_GET['txtcpf3'] . '%';
                      $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.dt_nascimento, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE cpf LIKE '$nome' order by nome asc";
                    } else if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.dt_nascimento, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE nome LIKE '$nome' order by nome asc";
                    } else {
                      $query = "SELECT r.id as req_id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.dt_nascimento, r.email, r.data, p.id, p.posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id ORDER BY nome asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                    ?>
                      <table class="table table-sm table-borderless table-striped">
                        <thead class="text-primary">
                          <th class="align-middle">#</th>
                          <th class="align-middle">Saram</th>
                          <th class="align-middle">CPF</th>
                          <th class="align-middle">Posto</th>
                          <th class="align-middle">Situação</th>
                          <th class="align-middle">Nome Completo</th>
                          <th class="align-middle">Est. Idoso</th>
                          <th class="align-middle">Email</th>
                          <th class="align-middle">Dt. Inclusão</th>
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
                            $dt_nascimento = $res_1['dt_nascimento'];
                            $email = $res_1['email'];
                            $data = data_show($res_1['data']);
                          ?>
                            <tr>
                              <td class="align-middle"><?php echo $id; ?></td>
                              <td class="align-middle"><?php echo $saram; ?></td>
                              <td class="align-middle"><?php echo $cpf; ?></td>
                              <td class="align-middle"><?php echo $posto; ?></td>
                              <td class="align-middle"><?php echo $situacao; ?></td>
                              <td class="align-middle"><?php echo '<a class="nav-link" href="requerentes.php?func=consulta&id=' . $id . '&cpf=' . $cpf . '" ?>'; ?><?php echo $nome; ?></td>
                              <td class="align-middle">
                                <?php
                                if (descobrirIdade($dt_nascimento) >= 60) {
                                  echo '<img src="../../dist/icons/accept-colored.svg" style="height: 30px; width:30px;"/>';
                                } else {
                                  echo '<img src="../../dist/icons/delete-colored.svg" style="height: 30px; width:30px;"/>';
                                } ?>
                              </td>
                              <td class="align-middle"><?php echo $email; ?></td>
                              <td class="align-middle"><?php echo $data; ?></td>
                              <td class="align-middle">
                                <a class="btn btn-dark btn-xs" data-toggle="popover" data-content="Visualizar processos atrelados" href="requerentes.php?func=consulta&id=<?php echo $id; ?>&cpf=<?php echo $cpf ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-warning btn-xs" data-toggle="popover" data-content="Editar" href="requerentes.php?func=edita&id=<?php echo $id; ?>"><i class="fas fa-tools"></i></a>
                                <a class="btn btn-danger btn-xs" data-toggle="popover" data-content="Excluir" href="requerentes.php?func=deleta&id=<?php echo $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><i class="far fa-trash-alt"></i></a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    <?php
                    } elseif ($row == 0) {
                      echo "<h5>Não existem dados para consulta</h5>";
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-----------------------------------------------------------------------------------------------MODAL--------------------------------------------------------------------------------------------------->
      <div id="modalExemplo" name="modalExemplo" class="modal fade" role="dialog">
        <!---Modal Exemplo--->
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-user-plus"></i> Inserir novo Requerente</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="row">
                  <div class="form-group col-4">
                    <label for="fornecedor">Saram</label>
                    <input type="text" class="form-control mr-2" id="txtsaram" name="txtsaram" autocomplete="off" maxlength="9" placeholder="000.000-0" required>
                  </div>
                  <div class="form-group col-5">
                    <label for="fornecedor">CPF</label>
                    <input type="text" class="form-control mr-2 cpf-mask" id="txtcpf" name="txtcpf" autocomplete="off" data-mask="000.000.000-00" maxlength="14" placeholder="000.000.000-00" required>
                  </div>
                  <div class="form-group col-3">
                    <label for="id_produto">Posto</label>
                    <select class="form-control mr-2" name="txtposto" required>
                      <option value="" disabled selected hidden>Posto</option>
                      <?php
                      $query_posto = "SELECT * FROM tb_posto where status = 'Aprovado'";
                      $result_posto = mysqli_query($conexao, $query_posto);
                      while ($res_ex = mysqli_fetch_array($result_posto)) {
                        $id_ex = $res_ex['id'];
                        $posto_ex = $res_ex['posto'];
                      ?>
                        <option value="<?php echo $id_ex ?>"><?php echo $posto_ex ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1"></div>
                  <div class="form-group">
                    <label for="id_produto">Situação</label><br>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="ativo" name="txtsituacao" value="AT" required>
                      <label class="custom-control-label" style="cursor: pointer; text-align: left;" for="ativo"><span></span>Ativo</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="inativo" name="txtsituacao" value="R1" required>
                      <label class="custom-control-label" style="cursor: pointer;" for="inativo"><span></span>Veterano</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="pensionista" name="txtsituacao" value="PM" required>
                      <label class="custom-control-label" style="cursor: pointer; text-align: right;" for="pensionista"><span></span>Pensionista</label>
                    </div>
                  </div>
                  <div class="col-2"></div>
                  <div class="form-group col-4" id="dtNascimento">
                    <label for="">Dt. Nascimento</label>
                    <input type="text" class="form-control mr-2" id="txtdtnascimento" name="txtdtnascimento" placeholder="00/00/0000" autocomplete="off" required>
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
    </div>
    <footer class="main-footer">
      <?php footer() ?>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
  <?php echo javascript('../../') ?>
  <script>
    $(document).ready(function() {
      $("#dtNascimento").hide();
      $("input[name$='txtsituacao']").click(function() {
        var test = $(this).val();
        if (test == 'R1') {
          $("#dtNascimento").show();
        } else if (test == 'PM') {
          $("#dtNascimento").show();
        } else {
          $("#dtNascimento").hide();
          $("#txtdtnascimento").removeAttr("required");
        }
      });
    });
  </script>
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
  $saram = $_POST['txtsaram'];
  $cpf = $_POST['txtcpf'];
  $posto = $_POST['txtposto'];
  $situacao = $_POST['txtsituacao'];
  $nome = strtoupper($_POST['txtnome']);
  $dtnascimento = data_db($_POST['txtdtnascimento']);
  $email = strtolower($_POST['txtemail']);



  //Verificar se o CPF já está cadastrado

  $query_verificar = "SELECT * FROM requerentes WHERE cpf = '$cpf'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "CPF já existe!", false, "requerentes.php");
    exit();
  }

  $query = "INSERT into requerentes (saram, cpf, posto, situacao, nome, dt_nascimento, email, data) VALUES ('$saram', '$cpf', '$posto', '$situacao', '$nome', '$dtnascimento','$email', curDate() )";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar!", false, "requerentes.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "requerentes.php");
  }

  //EXCLUIR DADOS DA TABELA
} else if (@$_GET['func'] == 'deleta') {
  $id_del = $_GET['id'];
  $query_del = "DELETE FROM requerentes WHERE id = '$id_del'";
  mysqli_query($conexao, $query_del);
  Alerta("success", "Excluído com sucesso!", false, "requerentes.php");

  // EDITAR REGISTRO
} else if (@$_GET['func'] == 'edita') {
  $id_ed = $_GET['id'];
  $query_ed = "SELECT * FROM requerentes WHERE id = '$id_ed'";
  $result_ed = mysqli_query($conexao, $query_ed);
  while ($res_2 = mysqli_fetch_array($result_ed)) {
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Requerentes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="row">
                <div class="form-group col-4">
                  <label for="fornecedor">Saram</label>
                  <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram2" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?php echo $res_2['saram']; ?>" required>
                </div>
                <div class="form-group col-4">
                  <label for="fornecedor">CPF</label>
                  <input type="text" class="form-control mr-2 cpf-mask" id="txtcpf2" name="txtcpf2" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?php echo $res_2['cpf']; ?>" required>
                </div>
                <div class="form-group col-4">
                  <label for="">Posto</label>
                  <select class="form-control mr-2" id="txtposto2" name="txtposto2" required>
                    <!--<option value="" disabled selected hidden><?php echo $res_2['posto']; ?></option>-->
                    <option value="" disabled selected hidden>Selecione o posto...</option>
                    <?php
                    $query_posto = "SELECT * FROM tb_posto WHERE status = 'Aprovado'";
                    $result_posto = mysqli_query($conexao, $query_posto);
                    while ($res_p = mysqli_fetch_array($result_posto)) {
                      $id_p = $res_p['id'];
                      $posto_p = $res_p['posto'];
                    ?>
                      <option value="<?php echo $id_p ?>"><?php echo $posto_p ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label for="">Situação</label><br>
                  <div class="custom-control custom-radio col-4">
                    <label class="container">Ativo
                      <input type="radio" value="AT" name="txtsituacao2">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="custom-control custom-radio col-4">
                    <label class="container">Veterano
                      <input type="radio" value="R1" name="txtsituacao2">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="custom-control custom-radio col-4">
                    <label class="container">Pensionista
                      <input type="radio" value="PM" name="txtsituacao2">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome2" name="txtnome2" autocomplete="off" placeholder="Nome Completo" value="<?php echo $res_2['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">E-mail</label>
                <input type="email" class="form-control mr-2" id="txtemail2" name="txtemail2" autocomplete="off" value="<?php echo $res_2['email']; ?>" placeholder="Email">
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
    <?php
    if (isset($_POST['buttonEditar'])) {
      $saram_ed = $_POST['txtsaram2'];
      $cpf_ed = $_POST['txtcpf2'];
      $posto_ed = $_POST['txtposto2'];
      $situacao_ed = $_POST['txtsituacao2'];
      $nome_ed = strtoupper($_POST['txtnome2']);
      $email_ed = strtolower($_POST['txtemail2']);

      //Certifica que o REQUERENTE não será duplicado e permite alterá-lo porque "insere" o mesmo CPF 
      if ($res_2['cpf'] != $cpf_ed) {
        $query_verificar = "SELECT * FROM requerentes WHERE cpf = '$cpf_ed'";
        $result_verificar = mysqli_query($conexao, $query_verificar);
        $dado_verificar = mysqli_fetch_array($result_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          Alerta("info", "Requerente já cadastrado!", false, "requerentes.php");
          exit();
        }
      }

      $query_editar = "UPDATE requerentes SET saram = '$saram_ed', cpf = '$cpf_ed', posto = '$posto_ed', situacao = '$situacao_ed', nome = '$nome_ed', email = '$email_ed' WHERE id = '$id_ed'";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar!", false, "requerentes.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "requerentes.php");
      }
    }
  }
  //CONSULTAR PROCESSOS

} else if (@$_GET['func'] == 'consulta') {
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
            <h4 class="modal-title" style="text-align:center; width: 100%;"><i class="fas fa-user"></i> <strong><?php echo $posto, " ", $situacao, " ", $nome ?></strong></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
              <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->
              <?php
              $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.prioridade, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.requerente = '$id' ORDER BY e.id asc";
              $result = mysqli_query($conexao, $query);
              $row = mysqli_num_rows($result);
              if ($row > 0) {
              ?>
                <table class="table table-sm table-borderless table-striped">
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
              } elseif ($row == 0) {
                echo "<h5>Não existem dados cadastrados no banco</h5>";
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
  }
}
  ?>