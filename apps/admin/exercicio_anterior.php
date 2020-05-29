<?php
session_start();
include('../../verificar_login.php');
include('../../conexao.php');
include('../../dist/php/functions.php');
login('ADMIN', '../../');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="../../image/png" href="../../dist/img/gapls.png">
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
  <script>
    $('[data-toggle="popover"]').popover({
      placement: 'auto',
      trigger: 'hover'
    });
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars"></i>
            <?= $_SESSION['nome_usuario'] ?>
            <span class="d-lg-none d-md-block">Some Actions</span>
          </a>
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
              <a href="exercicio_anterior.php" class="nav-link active">
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
      <section class="content">
        <div class="container-fluid">
          <br>
          <div class="row">
            <div class="col-12" style="display: inline">
              <img src="../../dist/icons/folder_full-colored.svg" class="nav-icon" style="width:4rem; height:4rem;">
              <h1 style="display: inline; vertical-align:middle; margin-left: 15px;">Exercício Anterior</h1>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-three-direito-tab" data-toggle="pill" href="#custom-tabs-three-direito" role="tab" aria-controls="custom-tabs-three-direito" aria-selected="true"><i class="far fa-folder-open"></i> Direito Pleiteado</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-estado-tab" data-toggle="pill" href="#custom-tabs-three-estado" role="tab" aria-controls="custom-tabs-three-estado" aria-selected="false"><i class="fas fa-users"></i> Estado do Processo</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false"><i class="far fa-comment-dots"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false"><i class="fas fa-tools"></i> Settings</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-three-accountability-tab" data-toggle="pill" href="#custom-tabs-three-accountability" role="tab" aria-controls="custom-tabs-three-accountability" aria-selected="false"><i class="fas fa-cash-register"></i> Prestação de Contas</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-direito" role="tabpanel" aria-labelledby="custom-tabs-three-direito-tab">
                      <div class="row">
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-dark">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_direitoPleiteado_exant";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>DIREITOS CADASTRADOS</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-database"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aprovado'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>DIREITOS "APROVADOS"</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-thumbs-up"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Aguardando'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>DIREITOS "AGUARDANDO"</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-history"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_direitoPleiteado_exant where status = 'Excluído'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>DIREITOS "EXCLUÍDOS"</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-thumbs-down"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <h3 style="text-align: center">Direitos Pleiteados</h3>
                          <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                            <!----------------------LISTAR TODOS OS DIREITOS-------------------------->

                            <?php
                            if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                              $nome = '%' . $_GET['txtpesquisar'] . '%';
                              $query = "SELECT * FROM tb_direitoPleiteado_exant WHERE direito LIKE '$nome' ORDER BY direito asc";
                            } else {
                              $query = "SELECT * FROM tb_direitoPleiteado_exant WHERE status <> 'Excluído' ORDER BY direito asc";
                            }
                            $result = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($result);

                            ?>

                            <!-------------------------------------------------->

                            <table class="table table-sm table-borderless table-striped">
                              <thead class="text-primary" style="text-align: center; overflow: auto;">
                                <th class="align-middle" style="width: 4%;">#</th>
                                <th class="align-middle" style="width: 65%;">Direito Pleiteado</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Ações</th>
                              </thead>
                              <tbody>
                                <?php
                                while ($res_1 = mysqli_fetch_array($result)) {
                                  $id = $res_1["id"];
                                  $direito = $res_1["direito"];
                                  $status = $res_1["status"];
                                ?>
                                  <tr style="text-align: center;">
                                    <td class="align-middle"><?= $id; ?></td>
                                    <td class="align-middle"><?= $direito; ?></td>
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
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Aguardando') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Excluído') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR o Direito Pleiteado?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                        <div id="modalDireito" class="modal fade" role="dialog">
                          <!---Modal Exemplo--->
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Inserir nova SEÇÃO</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="">
                                  <div class="form-group">
                                    <label for="id_produto">Direito Pleiteado</label>
                                    <input type="text" class="form-control mr-2" name="txtdireito" placeholder="Digite um novo Direito" autocomplete="off" required>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" name="buttonDireito" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!---------------------------------CADASTRAR-------------------------------------------->
                        <?php
                        if (isset($_POST['buttonDireito'])) {
                          $direito = strtoupper($_POST['txtdireito']);
                          $status_direito = 'Aprovado';

                          //Verificar se o DIREITO já está cadastrado

                          $query_verificar = "select * from tb_direitoPleiteado_exant where direito = '$direito'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
                          $result_verificar = mysqli_query($conexao, $query_verificar);
                          $dado_verificar = mysqli_fetch_array($result_verificar);
                          $row_verificar = mysqli_num_rows($result_verificar);

                          if ($row_verificar > 0) {
                            Alerta("info", "Direito já cadastrado!", false, "exercicio_anterior.php");
                            exit();
                          }

                          $query_direito = "INSERT into tb_direitoPleiteado_exant (direito, status) VALUES ('$direito', '$status_direito')";

                          $result_direito = mysqli_query($conexao, $query_direito);

                          if ($result_direito == '') {
                            Alerta("error", "Não foi possível cadastrar!", false, "exercicio_anterior.php");
                          } else {
                            Alerta("success", "Salvo com sucesso!", false, "exercicio_anterior.php");
                          }
                        }
                        ?>
                        <div class="col-4">
                          <button class="general-btn" href="#" data-toggle="modal" data-target="#modalDireito" data-tt="tooltip" title="Adicionar Direito"><img src="../../dist/icons/add-folder-colored.svg"></button>
                          <h3 style="text-align: center">Direitos Excluídos</h3>
                          <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                            <!---------------------- LISTAR TODOS DIREITOS EXCLUÍDOS -------------------------->
                            <?php
                            if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                              $nome = '%' . $_GET['txtpesquisar'] . '%';
                              $query = "SELECT * FROM tb_direitoPleiteado_exant WHERE direito LIKE '$nome' ORDER BY id asc";
                            } else {
                              $query = "SELECT * FROM tb_direitoPleiteado_exant WHERE status = 'Excluído' ORDER BY id asc";
                            }
                            $result = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($result);
                            ?>

                            <!-------------------------------------------------->

                            <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
                              <thead class="text-primary" style="text-align: center;">
                                <th class="align-middle" style="width: 4%;">#</th>
                                <th class="align-middle" style="width: 65%;">Direito Pleiteado</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Ações</th>
                              </thead>
                              <tbody>
                                <?php
                                while ($res_1 = mysqli_fetch_array($result)) {
                                  $id = $res_1["id"];
                                  $direito = $res_1["direito"];
                                  $status = $res_1["status"];
                                ?>
                                  <tr style="text-align: center;">
                                    <td class="align-middle"><?= $id; ?></td>
                                    <td class="align-middle"><?= $direito; ?></td>
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
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Aguardando') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Excluído') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR a seção?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaDireito&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaDireito&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                          <hr />
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-estado" role="tabpanel" aria-labelledby="custom-tabs-three-estado-tab">
                      <div class="row">
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-dark">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_estado_exant";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>ESTADOS CADASTRADOS</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-database"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_estado_exant where status = 'Aprovado'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>ESTADOS APROVADOS</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-thumbs-up"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_estado_exant where status = 'Aguardando'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>ESTADOS AGUARDANDO</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-history"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>
                                <?php
                                $query = "SELECT * FROM tb_estado_exant where status = 'Excluído'";
                                $result = mysqli_query($conexao, $query);
                                $row = mysqli_num_rows($result);
                                echo $row;
                                ?>
                              </h3>
                              <p>ESTADOS EXCLUÍDOS</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-thumbs-down"></i>
                            </div>
                            <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-8">
                          <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">
                            <!----------------------LISTAR TODOS OS ESTADOS-------------------------->

                            <?php
                            if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                              $nome = '%' . $_GET['txtpesquisar'] . '%';
                              $query = "SELECT * FROM tb_estado_exant WHERE estado LIKE '$nome' ORDER BY estado asc";
                            } else {
                              $query = "SELECT * FROM tb_estado_exant WHERE status <> 'Excluído' ORDER BY estado asc";
                            }
                            $result = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($result);
                            ?>
                            <!-------------------------------------------------->
                            <table class="table table-sm table-borderless table-striped">
                              <thead class="text-primary" style="text-align: center; overflow: auto;">
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
                                    <td class="align-middle"><?= $id; ?></td>
                                    <td class="align-middle"><?= $nome; ?></td>
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
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Aguardando') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Excluído') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR a seção?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                        <div id="modalEstado" class="modal fade" role="dialog">
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
                                    <input type="text" class="form-control mr-2" name="txtnome" placeholder="Digite um novo Estado" autocomplete="off" required>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" name="buttonEstado" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
                                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                        if (isset($_POST['buttonEstado'])) {
                          $nome = strtoupper($_POST['txtnome']);
                          $status_estado = 'Aprovado';

                          //Verificar se a SEÇÃO já está cadastrado

                          $query_verificar_estado = "SELECT * FROM tb_estado_exant WHERE estado = '$nome'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
                          $result_verificar_estado = mysqli_query($conexao, $query_verificar_estado);
                          $dado_verificar_estado = mysqli_fetch_array($result_verificar_estado);
                          $row_verificar_estado = mysqli_num_rows($result_verificar_estado);

                          if ($row_verificar_estado > 0) {
                            Alerta("info", "Estado já cadastrado!", false, "exercicio_anterior.php");
                            exit();
                          }

                          $query_estado = "INSERT into tb_estado_exant (estado, status) VALUES ('$nome', '$status_estado')";

                          $result_estado = mysqli_query($conexao, $query_estado);

                          if ($result_estado == '') {
                            Alerta("error", "Não foi possível cadastrar", false, "exercicio_anterior.php");
                          } else {
                            Alerta("success", "Salvo com sucesso!", false, "exercicio_anterior.php");
                          }
                        }

                        ?>
                        <div class="col-4">
                          <button type="button" class="general-btn" href="#" data-toggle="modal" data-target="#modalEstado" data-tt="tooltip" title="Adicionar Estado"><img src="../../dist/icons/add-folder-colored.svg"></button>
                          <div class="table-responsive" style="text-align: center; overflow-x:auto; overflow-y:auto;">

                            <!----------------------LISTAR TODOS OS ESTADOS EXCLUÍDOS-------------------------->

                            <?php
                            if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                              $nome = '%' . $_GET['txtpesquisar'] . '%';
                              $query = "SELECT * FROM tb_estado_exant WHERE estado LIKE '$nome' ORDER BY id asc";
                            } else {
                              $query = "SELECT * FROM tb_estado_exant WHERE status = 'Excluído' ORDER BY id asc";
                            }
                            $result = mysqli_query($conexao, $query);
                            $row = mysqli_num_rows($result);
                            ?>

                            <!-------------------------------------------------->

                            <table class="table table-sm table-borderless table-striped" style="table-layout: fixed;">
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
                                    <td class="align-middle"><?= $id; ?></td>
                                    <td class="align-middle"><?= $nome; ?></td>
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
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Aguardando') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo APROVAR a solicitação?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table"><i class="far fa-trash-alt"></i></button></a>
                                      <?php
                                      } elseif ($status == 'Excluído') { ?>
                                        <a href="exercicio_anterior.php?func=aprovaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo REATIVAR o status?');"><button class="btn btn-success btn-table"><i class="fas fa-thumbs-up"></i></button></a>
                                        <a href="#" target="_blank" rel=”noopener”><button class="btn btn-primary btn-table disabled"><i class="fas fa-print"></i></button></a>
                                        <a href="exercicio_anterior.php?func=editaEstado&id=<?= $id; ?>"><button class="btn btn-warning btn-table disabled"><i class="fas fa-tools"></i></button></a>
                                        <a href="exercicio_anterior.php?func=deletaEstado&id=<?= $id; ?>" onclick="return confirm('Deseja mesmo excluir o registro?');"><button class="btn btn-danger btn-table disabled"><i class="far fa-trash-alt"></i></button></a>
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
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-accountability" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                      <button class="general-btn" href="#" data-toggle="popover" data-content="Encaminhar processo"><img src="../../dist/icons/folder_full-colored.svg"></button>
                      <button class="general-btn" href="#" data-toggle="popover" data-content="Encaminhar processo"><img src="../../dist/icons/pdf_file-colored.svg"></button>
                      <button class="general-btn" href="#" data-toggle="popover" data-content="Encaminhar processo"><img src="../../dist/icons/accept_page.svg"></button>
                      <button class="general-btn" href="#" data-toggle="popover" data-content="Encaminhar processo"><img src="../../dist/icons/calendar-colored.svg"></button>
                    </div>
                  </div>
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
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>
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
  <script src="../../plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
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
  <script>
    $("[data-tt=tooltip]").tooltip({
      placement: 'auto'
    });
  </script>
</body>

</html>

<?php
// EDITAR REGISTRO DA TABELA                        
if (@$_GET['func'] == 'editaDireito') {
  $id_direito = $_GET['id'];
  $query_select_direito = "SELECT * FROM tb_direitoPleiteado_exant WHERE id = '$id_direito'";
  $result_select_direito = mysqli_query($conexao, $query_select_direito);
  while ($res_show_direito = mysqli_fetch_array($result_select_direito)) {
?>
    <div id="modalEditarDireito" class="modal fade" role="dialog">
      <!---Modal EDITAR --->
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar DIREITO PLEITEADO</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Direito Pleiteado</label>
                <input type="text" class="form-control mr-2" name="txtdireito2" value="<?= $res_show_direito['direito']; ?>" placeholder="Direito" autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="buttonEditarDireito" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal" style="text-transform: capitalize;"><i class="fas fa-times"></i> Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('#modalEditarDireito').modal("show");
    </script>
    <!--Modal EDITAR -->

<?php
    if (isset($_POST['buttonEditarDireito'])) {
      $direito2 = strtoupper($_POST['txtdireito2']);
      $query_verifica_direito = "SELECT * FROM tb_direitoPleiteado_exant WHERE direito = '$direito2'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
      $result_verifica_direito = mysqli_query($conexao, $query_verificar_direito);
      $row_verifica_direito = mysqli_num_rows($result_verifica_direito);

      if ($row_verifica_direito > 0) {
        Alerta("info", "Direito já cadastrado!", false, "exercicio_anterior.php");
        exit();
      }

      $query_edita_direito = "UPDATE tb_direitoPleiteado_exant SET direito = '$direito2' WHERE id = '$id_direito'";
      $result_edita_direito = mysqli_query($conexao, $query_edita_direito);
      if ($result_edita_direito == '') {
        Alerta("error", "Não foi possível editar!", false, "exercicio_anterior.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "exercicio_anterior.php");
      }
    }
  }
}

// APROVAR NOVO DIREITO NA TABELA
elseif (@$_GET['func'] == 'aprovaDireito') {
  $id = $_GET['id'];
  $query = "UPDATE tb_direitoPleiteado_exant SET status = 'Aprovado' WHERE id = '$id'";
  mysqli_query($conexao, $query);
  Alerta("success", "Aprovado com sucesso!", false, "exercicio_anterior.php");
}

// EXCLUIR DIREITO DA TABELA
elseif (@$_GET['func'] == 'deletaDireito') {
  $id_direito = $_GET['id'];
  $query_deleta_direito = "UPDATE tb_direitoPleiteado_exant SET status = 'Excluído' WHERE id = '$id_direito'";
  mysqli_query($conexao, $query_deleta_direito);
  Alerta("success", "Excluído com sucesso!", false, "exercicio_anterior.php");
}
?>

<!--------------------------- EDITAR ESTADO ---------------------------->
<?php
if (@$_GET['func'] == 'editaEstado') {
  $id_estado = $_GET['id'];
  $query_select_estado = "SELECT * FROM tb_estado_exant WHERE id = '$id_estado'";
  $result_select_estado = mysqli_query($conexao, $query_select_estado);
  while ($res_select_estado = mysqli_fetch_array($result_select_estado)) {
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
                <input type="text" class="form-control mr-2" name="txtnome2" value="<?= $res_select_estado['estado']; ?>" placeholder="Digite o estado..." autocomplete="off">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="buttonEditarEstado" style="text-transform: capitalize;"><i class="fas fa-check"></i> Salvar</button>
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

    <!-------------------------------------------------------------- Comando para alterar os dados da tabela ------------------------------------------------------------->

<?php
    if (isset($_POST['buttonEditarEstado'])) {
      $nome2 = strtoupper($_POST['txtnome2']);
      $query_verificar_estado = "SELECT * FROM tb_estado_exant WHERE estado = '$nome2'"; //Adicionar mais campos para filtrar. Por exemplo, SARAM.
      $result_verificar_estado = mysqli_query($conexao, $query_verificar_estado);
      $row_verificar_estado = mysqli_num_rows($result_verificar_estado);

      if ($row_verificar > 0) {
        Alerta("info", "Estado já cadastrado!", false, "exercicio_anterior.php");
        exit();
      }

      $query_editar_estado = "UPDATE tb_estado_exant SET estado = '$nome2' WHERE id = '$id_estado'";
      $result_editar_estado = mysqli_query($conexao, $query_editar_estado);
      if ($result_editar_estado == '') {
        Alerta("error", "Não foi possível editar!", false, "exercicio_anterior.php");
      } else {
        Alerta("success", "Editado com sucesso!", false, "exercicio_anterior.php");
      }
    }
  }
}

// APROVAR ESTADO
elseif (@$_GET['func'] == 'aprovaEstado') {
  $id_estado = $_GET['id'];
  $query_aprova_estado = "UPDATE tb_estado_exant SET status = 'Aprovado' WHERE id = '$id_estado'";
  mysqli_query($conexao, $query_aprova_estado);
  Alerta("success", "Aprovado com sucesso!", false, "exercicio_anterior.php");
}

//EXCLUIR ESTADO
elseif (@$_GET['func'] == 'deletaEstado') {
  $id_estado = $_GET['id'];
  $query_excluir_estado = "UPDATE tb_estado_exant SET status = 'Excluído' WHERE id = '$id_estado'";
  mysqli_query($conexao, $query_excluir_estado);
  Alerta("success", "Excluído com sucesso!", false, "exercicio_anterior.php");
}
?>

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