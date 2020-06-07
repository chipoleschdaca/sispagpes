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
    <?php navbar() ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_exant.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
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
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE REGISTROS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM requerentes";
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
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">ATIVOS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $queryAtivo = "SELECT * FROM requerentes WHERE situacao = 'AT'";
                      $resultAtivo = mysqli_query($conexao, $queryAtivo);
                      $rowAtivo = mysqli_num_rows($resultAtivo);
                      $percentual = number_format($rowAtivo / $row * 100, 0);
                      echo $rowAtivo . " (" . $percentual . "%)";
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-injured"></i></span>
                <div class="info-box-content" style="text-align: center">
                  <span class="info-box-text">VETERANOS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $queryVeterano = "SELECT * FROM requerentes WHERE situacao = 'R1'";
                      $resultVeterano = mysqli_query($conexao, $queryVeterano);
                      $rowVeterano = mysqli_num_rows($resultVeterano);
                      $percentual = number_format($rowVeterano / $row * 100, 0);
                      echo $rowVeterano . " (" . $percentual . "%)";
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-tag"></i></span>
                <div class="info-box-content" style="text-align: center">
                  <span class="info-box-text">PENSIONISTAS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $queryReformado = "SELECT * FROM requerentes WHERE situacao = 'PM'";
                      $resultReformado = mysqli_query($conexao, $queryReformado);
                      $rowReformado = mysqli_num_rows($resultReformado);
                      $percentual = number_format($rowReformado / $row * 100, 0);
                      echo $rowReformado . " (" . $percentual . "%)";
                      ?>
                    </h4>
                  </span>
                </div>
              </div>
            </div>
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
                  <div class="row" style="margin-bottom: 10px;">
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
                  <div class="table-responsive" style="text-align: center; overflow-x: hidden; height: 430px;">
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
                      <table class="table table-sm table-borderless table-striped" id="example1">
                        <thead class="text-primary">
                          <tr>
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
                          </tr>
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
                              <td class="align-middle"><?= $id; ?></td>
                              <td class="align-middle"><?= $saram; ?></td>
                              <td class="align-middle"><?= $cpf; ?></td>
                              <td class="align-middle"><?= $posto; ?></td>
                              <td class="align-middle"><?= $situacao; ?></td>
                              <td class="align-middle"><?= '<a class="nav-link" href="requerentes.php?func=consulta&id=' . $id . '&cpf=' . $cpf . '" ?>'; ?><?= $nome; ?></td>
                              <td class="align-middle">
                                <?php
                                if (($dt_nascimento) == '0000-00-00') {
                                  echo '<img src="../../dist/icons/delete-colored.svg" style="height: 30px; width:30px;"/>';
                                } else if (descobrirIdade($dt_nascimento) >= 60) {
                                  echo '<img src="../../dist/icons/accept-colored.svg" style="height: 30px; width:30px;"/>';
                                } else {
                                  echo '<img src="../../dist/icons/delete-colored.svg" style="height: 30px; width:30px;"/>';
                                } ?>
                              </td>
                              <td class="align-middle"><?= $email; ?></td>
                              <td class="align-middle"><?= $data; ?></td>
                              <td class="align-middle">
                                <a href="requerentes.php?func=consulta&id=<?= $id; ?>&cpf=<?= $cpf ?>"><button class="btn btn-dark btn-table" data-toggle="popover" data-content="Visualizar processos atrelados"><i class="fas fa-eye"></i></button></a>
                                <a href="requerentes.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table" data-toggle="popover" data-content="Editar"><i class="fas fa-tools"></i></button></a>
                                <a href="requerentes.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table" data-toggle="popover" data-content="Excluir"><i class="far fa-trash-alt"></i></button></a>
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
                        <option value="<?= $id_ex ?>"><?= $posto_ex ?></option>
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
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?= javascript('../../') ?>
  <!--<script>
    $(document).ready(function() {
      $("#example1").DataTable({
        "scrollX": false,
        "scrollY": "350px",
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
      });
    });
  </script>-->
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
  <script>
    $(document).ready(function() {
      $("#dtNascimento2").hide();
      $("input[name$='txtsituacao2']").click(function() {
        var test = $(this).val();
        if (test == 'R1') {
          $("#dtNascimento2").show();
        } else if (test == 'PM') {
          $("#dtNascimento2").show();
        } else {
          $("#dtNascimento2").hide();
          $("#txtdtnascimento2").removeAttr("required");
        }
      });
    });
  </script>
  <script>
    $("input[name$='txtsituacao2']").ready(function() {
      var test2 = $("input[name$='txtsituacao2']:checked").val();
      if (test2 == 'R1') {
        $("#dtNascimento2").show();
      } else if (test2 == 'PM') {
        $("#dtNascimento2").show();
      } else {
        $("#dtNascimento2").hide();
        $("#txtdtnascimento2").removeAttr("required");
      }
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
  if ($_POST['txtdtnascimento'] == '') {
    $dtnascimento = data_db('00/00/0000');
  } else {
    $dtnascimento = data_db($_POST['txtdtnascimento']);
  }
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
  $query_ed = "SELECT r.id, r.saram, r.cpf, r.posto, r.situacao, r.nome, r.dt_nascimento, r.email, p.id as id_posto, p.posto as nome_posto FROM requerentes as r LEFT JOIN tb_posto as p ON r.posto = p.id WHERE r.id = '$id_ed'";
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
                  <input type="text" class="form-control mr-2" id="txtsaram2" name="txtsaram2" autocomplete="off" maxlength="9" placeholder="000.000-0" value="<?= $res_2['saram']; ?>" required>
                </div>
                <div class="form-group col-4">
                  <label for="fornecedor">CPF</label>
                  <input type="text" class="form-control mr-2 cpf-mask" id="txtcpf2" name="txtcpf2" autocomplete="off" maxlength="14" placeholder="000.000.000-00" value="<?= $res_2['cpf']; ?>" required>
                </div>
                <div class="form-group col-4">
                  <label for="">Posto</label>
                  <select class="form-control mr-2" id="txtposto2" name="txtposto2" required>
                    <option value="<?= $res_2['id_posto']; ?>" selected><?= $res_2['nome_posto']; ?></option>
                    <?php
                    $query_posto = "SELECT * FROM tb_posto WHERE status = 'Aprovado'";
                    $result_posto = mysqli_query($conexao, $query_posto);
                    while ($res_p = mysqli_fetch_array($result_posto)) {
                      $id_p = $res_p['id'];
                      $posto_p = $res_p['posto'];
                    ?>
                      <option value="<?= $id_p ?>"><?= $posto_p ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <?php if ($res_2['situacao'] == 'AT') { ?>
                  <div class="form-group">
                    <label for="">Situação</label><br>
                    <div class="custom-control custom-radio col-4">
                      <label class="container">Ativo
                        <input type="radio" value="AT" name="txtsituacao2" checked>
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
                <?php
                } elseif ($res_2['situacao'] == 'R1') { ?>
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
                        <input type="radio" value="R1" name="txtsituacao2" checked>
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
                <?php
                } elseif ($res_2['situacao'] == 'PM') { ?>
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
                        <input type="radio" value="PM" name="txtsituacao2" checked>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                <?php } ?>
                <div class="col-2"></div>
                <div class="form-group col-4" id="dtNascimento2">
                  <label for="">Dt. Nascimento</label>
                  <input type="text" class="form-control mr-2" id="txtdtnascimento2" name="txtdtnascimento2" value="<?= data_show($res_2['dt_nascimento']); ?>" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nome Completo</label>
                <input type="text" class="form-control mr-2" id="txtnome2" name="txtnome2" autocomplete="off" placeholder="Nome Completo" value="<?= $res_2['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">E-mail</label>
                <input type="email" class="form-control mr-2" id="txtemail2" name="txtemail2" autocomplete="off" value="<?= $res_2['email']; ?>" placeholder="Email">
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
      if ($_POST['txtdtnascimento2'] == '') {
        $dtnascimento2 = data_db('00/00/0000');
      } else {
        $dtnascimento2 = data_db($_POST['txtdtnascimento2']);
      }
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

      $query_editar = "UPDATE requerentes SET saram = '$saram_ed', cpf = '$cpf_ed', posto = '$posto_ed', situacao = '$situacao_ed', dt_nascimento = '$dtnascimento2', nome = '$nome_ed', email = '$email_ed' WHERE id = '$id_ed'";

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
  $query = "SELECT * FROM requerentes WHERE id = '$id'";
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
            <h4 class="modal-title" style="text-align:center; width: 100%;"><i class="fas fa-user"></i> <strong><?= $posto, " ", $situacao, " ", $nome ?></strong></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
              <!-------------LISTAR TODOS OS ORÇAMENTOS-------------->
              <?php
              $query = "SELECT e.id, e.saram, e.cpf, e.requerente, e.sacador, e.nup, e.data_criacao, e.direito_pleiteado, e.secao_origem, e.obs, e.data_saida, e.estado, e.secao_atual, r.id as id_req, r.saram as req_saram, r.cpf as req_cpf, r.nome as req_nome, m.nome as mil_nome, d.direito as dir_direito, s.secao as sec_origem, sec.secao as sec_atual, est.estado as est_estado from exercicioanterior as e LEFT JOIN requerentes as r on e.saram = r.id LEFT JOIN militares as m on e.sacador = m.id LEFT JOIN tb_direitoPleiteado_exant as d ON e.direito_pleiteado = d.id LEFT JOIN tb_secoes_exant as s ON e.secao_origem = s.id LEFT JOIN tb_secoes_exant as sec ON e.secao_atual = sec.id LEFT JOIN tb_estado_exant as est ON e.estado = est.id WHERE e.requerente = '$id' ORDER BY e.id asc";
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
                        <td class="align-middle"><?= $id; ?></td>
                        <td class="align-middle"><?= $nup; ?></td>
                        <td class="align-middle"><?= data($data_criacao); ?></td>
                        <td class="align-middle"><?= $direito_pleiteado; ?></td>
                        <td class="align-middle"><?= $secao_origem; ?></td>
                        <td class="align-middle"><?= $estado; ?></td>
                        <td class="align-middle"><?= $secao_atual; ?></td>
                        <!--<td class="align-middle">R$ <?= number_format($valor_total, 2, ',', '.'); ?></td>-->
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