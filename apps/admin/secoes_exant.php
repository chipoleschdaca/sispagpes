<?php
session_start();
include('../../conexao.php');
include('../../verificar_login.php');
include('../../dist/php/functions.php');
login('ADMIN', '../../');
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include('../../dist/php/pageHead.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include('../../dist/php/pageNavbar.php'); ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="painel_admin.php" class="brand-link">
        <img src="../../dist/img/gapls.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <b><span class="brand-text font-weight-light">SISPAGPES</span></b>
      </a>
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
                    echo '<span class="badge badge-warning right">' . $row . '</span>';
                  } else {
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
              <a href="secoes_exant.php" class="nav-link active">
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
              <a href="posto.php" class="nav-link">
                <i class="nav-icon fas fa-medal"></i>
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
            <li class="nav-item">
              <a href="exercicio_anterior.php" class="nav-link">
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
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-database"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">TOTAL DE SEÇÕES</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_secoes_exant";
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
                  <span class="info-box-text">SEÇÕES "APROVADAS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_secoes_exant where status = 'Aprovado'";
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
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-history"></i></span>
                <div class="info-box-content" style="text-align:center;">
                  <span class="info-box-text">SEÇÕES "AGUARDANDO"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_secoes_exant where status = 'Aguardando'";
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
                  <span class="info-box-text">SEÇÕES "EXCLUÍDAS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_secoes_exant where status = 'Excluído'";
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
                  <h4 class="" style="text-align:center;"><strong>TABELA DE SEÇÕES</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from tb_secoes_exant where perfil LIKE '$nome' and status <> 'Excluído' order by id asc";
                    } else {
                      $query = "select * from tb_secoes_exant where status <> 'Excluído' order by id asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    ?>
                    <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Seção</th>
                        <th class="align-middle">Prazo Exercício Anterior (dias)</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle" style="width: 30%;">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $secao = $res_1["secao"];
                          $prazo_exant = $res_1["prazo_exant"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $secao; ?></td>
                            <td class="align-middle"><?= $prazo_exant; ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?= $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle" style="width: 30%;">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a href="#"><button class="btn btn-success btn-table disabled"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="rel/invoice-print.php?id=<?= $id; ?>" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              }
                              elseif ($status == 'Excluído') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR a seção?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              }
                              else {
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
                  <h3 class="card-title">SEÇÕES EXCLUÍDAS</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "SELECT * FROM tb_secoes_exant WHERE perfil LIKE '$nome' AND status = 'Excluído' ORDER BY id ASC";
                    } else {
                      $query = "SELECT * FROM tb_secoes_exant WHERE status = 'Excluído' ORDER BY id ASC";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);
                    ?>
                    <table class="table table-sm table-bordered table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Seção</th>
                        <th class="align-middle">Prazo Exercício Anterior (dias)</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $secao = $res_1["secao"];
                          $prazo_exant = $res_1["prazo_exant"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $secao; ?></td>
                            <td class="align-middle"><?= $prazo_exant ?></td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aguardando') { ?>
                                <span class="badge badge-warning">
                                  <?= $status; ?>
                                </span>
                              <?php
                              } else if ($status == 'Aprovado') { ?>
                                <span class="badge badge-success">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?= $status; ?>
                                </span>
                              <?php
                              }
                              else {
                                echo $status;
                              }
                              ?>
                            </td>
                            <td class="align-middle">
                              <?php
                              if ($status == 'Aprovado') { ?>
                                <a href="#"><button class="btn btn-success btn-table disabled"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="rel/invoice-print.php?id=<?= $id; ?>" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              }
                              elseif ($status == 'Excluído') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR a seção?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <!-- <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a> -->
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              }
                              else {
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
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inserir nova SEÇÃO</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Seção</label>
                      <input type="text" class="form-control mr-2" name="txtsecao" placeholder="Digite a sigla da nova seção" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                      <label for="id_produto">Prazo Exercício Anterior (dias)</label>
                      <input type="text" class="form-control mr-2" name="txtprazoexant" placeholder="Digite o prazo para despachar um processo de Exercício Anterior" autocomplete="off" required>
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
      </section>
    </div>
    <?php include('../../dist/php/pageFooter.php'); ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php include('../../dist/php/pageJavascript.php'); ?>
</body>

</html>

<?php
if (isset($_POST['button'])) {
  $secao = strtoupper($_POST['txtsecao']);
  $prazo_exant = $_POST['txtprazoexant'];
  $status = 'Aprovado';

  //Verificar se a SEÇÃO já está cadastrado

  $query_verificar = "SELECT * FROM tb_secoes_exant WHERE secao = '$secao'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Seção já cadastrada!", false, "secoes_exant.php");
    exit();
  }

  $query = "INSERT INTO tb_secoes_exant (secao, prazo_exant, status) VALUES ('$secao', '$prazo_exant', '$status')";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar!", false, "secoes_exant.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "secoes_exant.php");
  }
}

//<!---------------------------EDITAR REGISTRO DA TABELA---------------------------->

elseif (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "SELECT * FROM tb_secoes_exant WHERE id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST" action="">
            <div class="modal-header">
              <h4 class="modal-title">Editar SEÇÃO</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="id_produto">Seção</label>
                <input type="text" class="form-control mr-2" name="txtsecao2" value="<?= $res_1['secao']; ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="id_produto">Prazo Exercício Anterior</label>
                <input type="text" class="form-control mr-2" name="txtprazoexant2" value="<?= $res_1['prazo_exant']; ?>" autocomplete="off" disabled>
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

<?php
    if (isset($_POST['buttonEditar'])) {
      $secao2 = strtoupper($_POST['txtsecao2']);
      $prazo_exant2 = $_POST['txtprazoexant2'];
      $query_verificar = "SELECT * FROM tb_secoes_exant WHERE secao = '$secao'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
      $result_verificar = mysqli_query($conexao, $query_verificar);
      $row_verificar = mysqli_num_rows($result_verificar);

      if (($secao2 != $res_1['secao']) and $row_verificar > 0) {
        Alerta("info", "Seção já cadastrada!", false, "secoes_exant.php");
        exit();
      }

      $query_editar = "UPDATE tb_secoes_exant SET secao = '$secao2', prazo_exant = '$prazo_exant2' WHERE id = '$id'";
      $result_editar = mysqli_query($conexao, $query_editar);
      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar!", false, "secoes_exant.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "secoes_exant.php");
      }
    }
  }
}

//<!---------------------------APROVAR NOVA SEÇÃO NA TABELA---------------------------->
elseif (@$_GET['func'] == 'aprova') {
  $id = $_GET['id'];
  $query = "UPDATE tb_secoes_exant SET status = 'Aprovado' WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Aprovado com sucesso!", false, "secoes_exant.php");
}

//<!--------------------------EXCLUIR REGISTRO DA TABELA--------------------------->
elseif (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "UPDATE tb_secoes_exant SET status = 'Excluído' WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso!", false, "secoes_exant.php");
}
?>