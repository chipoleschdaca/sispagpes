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
  <?php head('../../') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Este é a tag que faz aparecer o nome aparece no menu direito superior. -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars"></i>
            <?= $_SESSION['nome_usuario'] ?>
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
              <a href="posto.php" class="nav-link active">
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
                  <span class="info-box-text">TOTAL DE POSTOS</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_posto";
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
                  <span class="info-box-text">POSTOS "APROVADOS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_posto where status = 'Aprovado'";
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
                  <span class="info-box-text">POSTOS "AGUARDANDO"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_posto where status = 'Aguardando'";
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
                  <span class="info-box-text">POSTOS "EXCLUÍDOS"</span>
                  <span class="info-box-number">
                    <h4>
                      <?php
                      $query = "SELECT * FROM tb_posto where status = 'Excluído'";
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
                  <h4 class="" style="text-align:center;"><strong>TABELA DE POSTOS</strong></h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:20px;" data-toggle="modal" style="text-transform: capitalize;" data-target="#modalExemplo">
                    <i class="fas fa-plus"></i> Inserir Novo
                  </button>
                  <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                    <?php
                    if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                      $nome = '%' . $_GET['txtpesquisar'] . '%';
                      $query = "select * from tb_posto where perfil LIKE '$nome' and status <> 'Excluído' order by id asc";
                    } else {
                      $query = "select * from tb_posto where status <> 'Excluído' order by id asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);

                    ?>

                    <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Posto</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $posto = $res_1["posto"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $posto; ?></td>
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
                              } else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?= $status; ?>
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
                                <a href="#"><button class="btn btn-success btn-table disabled"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="rel/invoice-print.php?id=<?= $id; ?>" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table"><i class="fas fa-print"></i></button></a>
                                <a href="posto.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="posto.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a href="posto.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                <a href="posto.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="posto.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Excluído') { ?>
                                <a href="posto.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR o Posto?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                <a href="posto.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                <a href="posto.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                  <h3 class="card-title">POSTOS EXCLUÍDOS</h3>
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
                      $query = "select * from tb_posto where perfil LIKE '$nome' and status = 'Excluído' order by id asc";
                    } else {
                      $query = "select * from tb_posto where status = 'Excluído' order by id asc";
                    }
                    $result = mysqli_query($conexao, $query);
                    $row = mysqli_num_rows($result);

                    ?>

                    <!-------------------------------------------------->

                    <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
                      <thead class="text-primary" style="text-align: center;">
                        <th class="align-middle">#</th>
                        <th class="align-middle">Posto</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Ações</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($res_1 = mysqli_fetch_array($result)) {
                          $id = $res_1["id"];
                          $posto = $res_1["posto"];
                          $status = $res_1["status"];
                        ?>
                          <tr style="text-align: center;">
                            <td class="align-middle"><?= $id; ?></td>
                            <td class="align-middle"><?= $posto; ?></td>
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
                              } else if ($status == 'Excluído') { ?>
                                <span class="badge badge-danger">
                                  <?= $status; ?>
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
                                <a href="#"><button class="btn btn-success btn-table disabled"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="rel/invoice-print.php?id=<?= $id; ?>" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table"><i class="fas fa-print"></i></button></a>
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Aguardando') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                              <?php
                              } elseif ($status == 'Excluído') { ?>
                                <a href="secoes_exant.php?func=aprova&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR o Posto?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                <a href="secoes_exant.php?func=edita&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                <a href="secoes_exant.php?func=deleta&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div id="modalExemplo" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Inserir novo Posto</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="id_produto">Posto</label>
                      <input type="text" class="form-control mr-2" name="txtposto" placeholder="Ex.: MJ" autocomplete="off" maxlength="2" required>
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
    <footer class="main-footer">
      <?php footer() ?>
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php javascript('../../') ?>
</body>

</html>

<?php
if (isset($_POST['button'])) {
  $posto = strtoupper($_POST['txtposto']);
  $status = 'Aprovado';

  //Verificar se o Posto já está cadastrado

  $query_verificar = "select * from tb_posto where posto = '$posto'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $dado_verificar = mysqli_fetch_array($result_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    Alerta("info", "Posto já cadastrado!", false, "posto.php");
    exit();
  }

  $query = "INSERT into tb_posto (posto, status) VALUES ('$posto', '$status')";

  $result = mysqli_query($conexao, $query);

  if ($result == '') {
    Alerta("error", "Não foi possível cadastrar!", false, "posto.php");
  } else {
    Alerta("success", "Salvo com sucesso!", false, "posto.php");
  }
}

?>

<!--------------------------EXCLUIR REGISTRO DA TABELA--------------------------->
<?php
if (@$_GET['func'] == 'deleta') {
  $id = $_GET['id'];
  $query = "UPDATE tb_posto set status = 'Excluído' where id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Excluído com sucesso!", false, "posto.php");
}
?>
<!------------------------------------------------------------------------------->

<!---------------------------EDITAR REGISTRO DA TABELA---------------------------->
<?php
if (@$_GET['func'] == 'edita') {
  $id = $_GET['id'];
  $query = "select * from tb_posto where id = '$id'";
  $result = mysqli_query($conexao, $query);
  while ($res_1 = mysqli_fetch_array($result)) {
?>
    <div id="modalEditar" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar POSTO</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Postos</label>
                <input type="text" class="form-control mr-2" name="txtposto2" value="<?= $res_1['posto']; ?>" maxlength="2" autocomplete="off">
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
<?php
    if (isset($_POST['buttonEditar'])) {
      $posto2 = strtoupper($_POST['txtposto2']);
      $query_verificar = "select * from tb_posto where posto = '$posto'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
      $result_verificar = mysqli_query($conexao, $query_verificar);
      $row_verificar = mysqli_num_rows($result_verificar);

      if ($row_verificar > 0) {
        Alerta("info", "Posto já cadastrado!", false, "posto.php");
        exit();
      }

      $query_editar = "UPDATE tb_posto set posto = '$posto2' where id = '$id'";
      $result_editar = mysqli_query($conexao, $query_editar);
      if ($result_editar == '') {
        Alerta("error", "Não foi possível editar!", false, "posto.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "posto.php");
      }
    }
  }
}

// APROVAR NOVA SEÇÃO NA TABELA

if (@$_GET['func'] == 'aprova') {
  $id = $_GET['id'];
  $query = "UPDATE tb_posto set status = 'Aprovado' where id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Aprovado com sucesso!", false, "posto.php");
}
?>